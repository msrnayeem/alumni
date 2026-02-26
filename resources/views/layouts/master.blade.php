<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>South Asia University Bangladesh | Official Degree Verification Portal</title>

<!-- Meta SEO -->
<meta name="description" content="Official South Asia University Bangladesh degree verification portal. Authenticate and verify certificates, transcripts, and academic credentials online."/>
<meta name="keywords" content="South Asia University Bangladesh, SAU Bangladesh degree verification, SAU certificate verification, SAU transcript authentication, SAU BD verification"/>
<meta name="author" content="South Asia University Bangladesh"/>

<!-- Open Graph for social sharing -->
<meta property="og:title" content="South Asia University Bangladesh | Degree Verification Portal"/>
<meta property="og:description" content="Official portal for verifying South Asia University Bangladesh degrees, certificates, and transcripts online."/>
<meta property="og:image" content="https://www.southasiaverification.xyz/assets/images/logo.png"/>
<meta property="og:url" content="https://www.southasiaverification.xyz/degree-verification"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="South Asia University Bangladesh"/>

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="South Asia University Bangladesh | Degree Verification Portal"/>
<meta name="twitter:description" content="Authenticate South Asia University Bangladesh certificates and degrees through the official verification portal."/>
<meta name="twitter:image" content="https://www.southasiaverification.xyz/assets/images/logo.png"/>

<!-- Schema.org Markup -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "CollegeOrUniversity",
  "name": "South Asia University Bangladesh",
  "url": "https://www.southasiaverification.xyz",
  "logo": "https://www.southasiaverification.xyz/img/logo.png",
  "sameAs": [
    "https://www.facebook.com/uapbd",
    "https://twitter.com/uap_bd"
  ],
  "department": {
    "@@type": "EducationalOrganization",
    "name": "Degree Verification Department",
    "url": "https://www.southasiaverification.xyz/degree-verification"
  }
}
</script>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stack('styles')
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')

</body>
</html>
