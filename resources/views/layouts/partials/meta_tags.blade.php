<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keyword" content="@yield('meta_keyword')">
<meta property="og:type" content="website">
<meta property="og:url" content="@yield('url',urldecode(Request::url()))">
<meta property="og:title" content="@yield('title','Afnan Simple Task Manager : easy task manager')">
<meta property="og:image" content="@yield('image',asset('assets/images/og_image.svg') )">
<meta name="author" content="@yield('title','Afnan Simple Task Manager : easy task manager')" />
<meta property="twitter:card" content="summary">
<meta property="twitter:url" content="@yield('url',urldecode(Request::url()))" />
<meta property="twitter:title" content="@yield('title','Afnan Simple Task Manager : easy task manager')" />
<meta property="twitter:image" content="@yield('image',asset('assets/images/og_image.svg') )" />
<meta name="twitter:app:name:iphone" content="@yield('title', 'Afnan Simple Task Manager : easy task manager')" />
<meta name="twitter:app:url:iphone" content="@yield('url',urldecode(Request::url()))" />
<meta name="twitter:app:name:ipad" content="@yield('title','Afnan Simple Task Manager : easy task manager')" />
<meta name="twitter:app:url:ipad" content="@yield('url',urldecode(Request::url()))" />
<meta name="twitter:app:name:googleplay" content="" />
<meta name="twitter:app:id:googleplay" content="" />
<meta name="twitter:app:url:googleplay" content="@yield('url',urldecode(Request::url()))" />
<meta property="og:type" content="website" />
<meta property="og:url" content="@yield('url',urldecode(Request::url()))" />
<meta property="og:title" content="@yield('title','Afnan Simple Task Manager : easy task manager')" />
<meta property="og:image" content="@yield('image',asset('assets/images/og_image.svg') )" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:ttl" content="@yield('og_ttl')" />
<meta property="og:updated_time" content="@yield('updated_time')" />
<meta property="og:site_name" content="{{ 'Afnan Simple Task Manager : easy task manager'}}" />
<meta property="fb:app_id" content="@yield('facebook_app_id')"/>
<meta property="fb:pages" content="@yield('facebook_app_id')"/>
<meta name="robots" content="@yield('robots_content', 'index,follow')" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta name="theme-color" content="" />
<meta name="description" content="@yield('meta_description')">
<meta property="twitter:description" content="@yield('meta_description')">
<meta property="og:description" content="@yield('meta_description')">
<link rel="canonical" href="@yield('url',urldecode(Request::url()))" />
<link rel="icon" href="{{asset('assets/images/og_image.svg')}}"/>
<link rel="publisher" href="@yield('title','Afnan Simple Task Manager : easy task manager')" />
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/images/Fav_Icon.svg')}}" rel="preload" as="image" />
<link rel="image_src" href="@yield('image',asset('assets/images/og_image.svg') )"/>
<title>@yield('title','Afnan Simple Task Manager : easy task manager')</title>