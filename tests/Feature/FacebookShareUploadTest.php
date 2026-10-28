<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FacebookShareUploadTest extends TestCase
{
    public function test_images_over_10_mb_are_rejected_with_a_clear_error(): void
    {
        $response = $this->post(route('admin.facebook.share.store'), [
            'image' => UploadedFile::fake()->image('large.png')->size(10241),
            'writeup' => 'Test share',
        ]);

        $response->assertSessionHasErrors([
            'image' => 'The image must not be larger than 10 MB.',
        ]);
    }

}
