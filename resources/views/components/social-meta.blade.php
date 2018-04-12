<meta name="description" content="{{ $desc }}" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $title }}">
<meta itemprop="description" content="{{ $desc }}">
<meta itemprop="image" content="{{ $image }}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="{{ $image }}">
<meta name="twitter:site" content="{{ url('/') }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:creator" content="{{ $author }}">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="{{ $image }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:image" content="{{ $image }}" />
<meta property="og:description" content="{{ $desc }}" />
<meta property="og:site_name" content="Karyaku - Direktori Karya Mahasiswa" />
