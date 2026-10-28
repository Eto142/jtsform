<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\SharedPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class XShareHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_and_clear_twitter_share_history(): void
    {
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $post = SharedPost::create([
            'image' => 'shared_images/test.jpg',
            'writeup' => 'Test X share',
            'token' => 'abc123xyz',
            'phone_share' => false,
            'platform' => 'twitter',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/share/twitter');

        $response->assertOk();
        $response->assertSee('Share History');
        $response->assertSee('Copy link');
        $response->assertSee('Clear all');

        $this->actingAs($admin, 'admin')
            ->delete('/admin/share/twitter/history')
            ->assertRedirect();

        $this->assertDatabaseMissing('shared_posts', ['id' => $post->id]);
    }

    public function test_generated_x_share_link_serves_twitter_card_metadata(): void
    {
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($admin, 'admin')->post(route('admin.twitter.share.store'), [
            'image' => UploadedFile::fake()->image('share.jpg'),
            'writeup' => 'Test X share',
        ]);

        $response->assertOk();

        $post = SharedPost::where('platform', 'twitter')->firstOrFail();
        $shareUrl = route('x.share.show', ['token' => $post->token]);
        $response->assertSee($shareUrl, false);

        try {
            $preview = $this->withHeaders(['User-Agent' => 'Twitterbot'])
                ->get($shareUrl);

            $preview->assertOk()
                ->assertSee('name="twitter:card" content="summary_large_image"', false)
                ->assertSee('property="og:image" content="' . url('/' . $post->image) . '"', false)
                ->assertSee('name="twitter:image" content="' . url('/' . $post->image) . '"', false);
        } finally {
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
        }
    }
}
