<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = [
            [
                "category" => "Laravel",
                "author" => "John Doe",
                "post_date" => "2024-06-01",
                "post_title" => "Introduction to Laravel",
                "post_content" => "Laravel is a web application framework with expressive, elegant syntax. It provides a robust set of tools and resources to build modern PHP applications. In this post, we will explore the basics of Laravel and how to get started with it."
            ],
            [
                "category" => "PHP",
                "author" => "Jane Smith",
                "post_date" => "2024-06-02",
                "post_title" => "Getting Started with PHP",
                "post_content" => "PHP is a popular general-purpose scripting language that is especially suited to web development. It is fast, flexible, and pragmatic. In this post, we will cover the fundamentals of PHP and how to set up a development environment."
            ],
            [
                "category" => "Web Development",
                "author" => "Alice Johnson",
                "post_date" => "2024-06-03",
                "post_title" => "Best Practices in Web Development",
                "post_content" => "Web development is a broad term for the work involved in developing a website for the Internet. It can range from developing a simple single static page to complex web applications. In this post, we will discuss some of the best practices in web development to help you create efficient and maintainable websites."
            ],
            [
                "category" => "JavaScript",
                "author" => "Bob Brown",
                "post_date" => "2024-06-04",
                "post_title" => "Understanding JavaScript Closures",
                "post_content" => "A closure is the combination of a function and the lexical environment within which that function was declared. Closures are a powerful feature in JavaScript that allows functions to access variables from an enclosing scope, even after that scope has finished executing. In this post, we will delve into the concept of closures and how they work in JavaScript."
            ]
        ];


        return view('blogs.posts', compact('posts'));
    }
}
