<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'comment' => 'Comment 1',
            'user_id' => '1',
            'product_id' => '1',
        ]);
        Comment::create([
            'comment' => 'Comment 2',
            'user_id' => '2',
            'product_id' => '2',
        ]);
        Comment::create([
            'comment' => 'Comment 3',
            'user_id' => '3',
            'product_id' => '3',
        ]);
        Comment::create([
            'comment' => 'Comment 4',
            'user_id' => '4',
            'product_id' => '4',
        ]);
        Comment::create([
            'comment' => 'Comment 5',
            'user_id' => '5',
            'product_id' => '5',
        ]);
    }
}
