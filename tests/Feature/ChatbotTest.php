<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    /**
     * Test chatbot returns welcome greeting response for 'halo' keyword.
     */
    public function test_chatbot_returns_greeting_response()
    {
        $response = $this->postJson(route('chatbot.message'), [
            'message' => 'Halo Nova, apa kabar?'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['reply', 'options'])
                 ->assertJsonFragment([
                     'options' => [
                         "Tanya Layanan Web",
                         "Estimasi Biaya Proyek",
                         "Teknologi yang Dipakai",
                         "Hubungi Sales WA"
                     ]
                 ]);

        $this->assertStringContainsString('Nova', $response->json('reply'));
    }

    /**
     * Test chatbot returns services information for 'layanan' keyword.
     */
    public function test_chatbot_returns_services_information()
    {
        $response = $this->postJson(route('chatbot.message'), [
            'message' => 'Saya mau tanya tentang layanan pembutan web'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['reply', 'options']);

        $this->assertStringContainsString('3D Web Development', $response->json('reply'));
        $this->assertStringContainsString('Laravel Web App', $response->json('reply'));
    }

    /**
     * Test chatbot returns fallback response for completely unknown query.
     */
    public function test_chatbot_returns_fallback_for_unknown_query()
    {
        $response = $this->postJson(route('chatbot.message'), [
            'message' => 'Bagaimana cara mendarat di Mars?'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['reply', 'options']);

        $this->assertStringContainsString('Nova bisa bantu jelaskan', $response->json('reply'));
    }

    /**
     * Test chatbot validates input message parameter.
     */
    public function test_chatbot_validates_input_message()
    {
        $response = $this->postJson(route('chatbot.message'), []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['message']);
    }
}
