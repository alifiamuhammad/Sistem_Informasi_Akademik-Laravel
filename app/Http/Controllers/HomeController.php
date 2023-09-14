<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Staff;
use App\Models\DynamicPage;
use App\Models\Research;

class HomeController extends Controller
{

	public function index() {
		$data['news'] = Post::where('category_id', 2)->latest()->take(3)->get();
		return view('home.index', $data);
	}

	public function about() {
		return view('home.about');
	}

	public function contact() {
		return view('home.contact');
	}

	public function penelitian() {
		$data['researches'] = Research::latest()->get();
		return view('home.research', $data);
	}

	public function staff() {
		$data['staff'] = Staff::get();
		return view('home.staff', $data);
	}

	public function staffDetail($slug) {
		$data['staff'] = Staff::where('slug', $slug)->first();
		return view('home.staff-detail', $data);
	}

	public function news() {
		$data['news'] = Post::where('category_id', 2)->get();
		return view('home.news', $data);
	}

	public function newsDetail($slug) {
		$data['content'] = Post::where('slug', $slug)->first();
		return view('home.news-detail', $data);
	}

	public function dynamicPage($slug) {
		$data['content'] = DynamicPage::where('slug', $slug)->first();
		$data['posts'] = Post::where('dynamic_page_content_id', $data['content']->id)->get();
		return view('home.dynamic-page', $data);
	}

	
    public function translationPage() {
		return view('home.translation');
			
    }
}

