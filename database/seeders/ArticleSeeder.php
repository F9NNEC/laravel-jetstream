<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'How to position your furniture for positivity',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores, possimus pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum eveniet corporis quidem, mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa eius atque dignissimos. Molestias explicabo corporis voluptatem?',
            'image_url' => 'https://images.unsplash.com/photo-1661956602116-aa6865609028?auto=format&fit=crop&q=80&w=1160',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'The Art of Minimalist Living',
            'content' => 'Discover the beauty of simplicity in your daily life. Minimalism isn\'t just about owning less; it\'s about making room for more of what matters. Learn how to declutter your space and mind, creating a serene environment that fosters creativity and peace.',
            'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=1160',
            'published_at' => now()->subDays(1),
        ]);

        Article::create([
            'title' => 'Sustainable Home Decor Ideas',
            'content' => 'Embrace eco-friendly choices in your home decoration. From recycled materials to plant-based dyes, explore ways to make your living space beautiful while being kind to the planet. This article covers practical tips for creating a sustainable and stylish home.',
            'image_url' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&q=80&w=1160',
            'published_at' => now()->subDays(2),
        ]);
    }
}
