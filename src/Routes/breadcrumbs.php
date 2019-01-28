<?php

// Home
Breadcrumbs::for('home', function ($trail) {
  $trail->push('Home', route('home'));
});

// Property
Breadcrumbs::for('rt-admin.posts.index', function ($trail) {
  $trail->parent('home');
  $trail->push('Properties', route('rt-admin.posts.index'));
});

// Property > Add New
Breadcrumbs::for('rt-admin.posts.create', function ($trail) {
  $trail->parent('home');
  $trail->push('Properties', route('rt-admin.posts.index'));
  $trail->push('Add New', route('rt-admin.posts.index'));
});

// Property > Show
Breadcrumbs::for('rt-admin.posts.show', function ($trail, $post) {
  $trail->parent('home');
  $trail->push('Properties', route('rt-admin.posts.index'));
  $trail->push($post->post_title, route('rt-admin.posts.index'));
});

// Term
Breadcrumbs::for('rt-admin.terms.index', function ($trail) {
  $trail->parent('home');
  $trail->push('Term : '.title_case(request()->get('taxonomy')), route('rt-admin.terms.index'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
  $trail->parent('home');
  $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
  $trail->parent('home');
  $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
  $trail->parent('blog');
  $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
  $trail->parent('category', $post->category);
  $trail->push($post->title, route('post', $post->id));
});