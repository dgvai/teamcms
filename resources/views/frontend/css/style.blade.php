<?php 

use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
/*
Theme Name: Colorlib Bootstrap Theme
Author: yaminncco
License: MIT

Colors:
	Body 		  : #868F9B
	Headers 	: {{$site->theme_color_secondary}}
	Primary 	: {{$site->theme_color_primary}}
	Dark      : #FCFCFF
	Grey 		  : #F4F4F4 #FAFAFA #EEE

Fonts: Montserrat Varela Round

------------------------------------*/
?>

<style>
/* -- typography -- */

body {
    font-family: 'Varela Round', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    overflow-x: hidden;
    color: #868F9B;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    margin-top: 0px;
    margin-bottom: 20px;
    color: {{$site->theme_color_secondary}};
}

h1 {
    font-size: 54px;
}

h2 {
    font-size: 36px;
}

h3 {
    font-size: 21px;
}

h4 {
    font-size: 18px;
}

h5 {
    font-size: 16px;
}

a {
    color: {{$site->theme_color_primary}};
    text-decoration: none;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
}

a:hover, a:focus {
    text-decoration: none;
    outline: none;
    opacity: 0.8;
    color: {{$site->theme_color_primary}};
}

.main-color {
    color: {{$site->theme_color_primary}};
}

.white-text {
    color: #FFF;
}

::-moz-selection {
    background-color: {{$site->theme_color_primary}};
    color: #FFF;
}

::selection {
    background-color: {{$site->theme_color_primary}};
    color: #FFF;
}

ul, ol {
    margin: 0;
    padding: 0;
    list-style: none
}

.ribbon {
    position: absolute;
    background-color: {{$site->theme_color_primary}};
    color: #FFFFFF;
    width: 100px;
    text-align: center;
    border-radius: 0px 0px 0px 10px;
    top: 0;
    right: 0;
}

/* -- section  -- */

.section {
    position: relative;
}

.md-padding {
    padding-top: 120px;
    padding-bottom: 120px;
}

.sm-padding {
    padding-top: 60px;
    padding-bottom: 60px;
}


/* --  background section  -- */

.bg-grey {
    background-color: #FAFAFA;
    border-top: 1px solid #FAFAFA;
    border-bottom: 1px solid #FAFAFA;
}

.bg-grey-deep {
    background-color: #F4F4F4;
    border-top: 1px solid #F4F4F4;
    border-bottom: 1px solid #F4F4F4;
}

.bg-dark {
    background-color: #1C1D21;
}


/* --  background image section  -- */

.bg-img {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
}

.bg-img .overlay {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    opacity: .8;
    background: #1C1D21;
}


/* --  section header  -- */

.section-header {
    position: relative;
    margin-bottom: 60px;
}

.section-header .title {
    text-transform: capitalize;
}

.title:after {
    content:"";
  	display:block;
  	height:3px;
  	width:100%;
  	background-color: {{$site->theme_color_primary}};
    margin-top: 15px;
}

.text-center .title:after {
    margin: 20px auto 0px;
}

/* --  Input  -- */

input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="date"], input[type="url"], input[type="tel"], textarea {
    height: 40px;
    width: 100%;
    border: none;
	  background: #F4F4F4;
    border-bottom: 2px solid #EEE;
    color: #354052;
    padding: 0px 10px;
    opacity: 0.5;
    -webkit-transition: 0.2s border-color, 0.2s opacity;
    transition: 0.2s border-color, 0.2s opacity;
}

textarea {
    padding: 10px 10px;
    min-height: 80px;
    resize: vertical;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus, input[type="date"]:focus, input[type="url"]:focus, input[type="tel"]:focus, textarea:focus {
    border-color: {{$site->theme_color_primary}};
    opacity: 1;
}

.bullete .bullete-box {
    position: absolute;
    left: 0;
    height: 30px;
    width: 140px;
    z-index: 989;
    background-color: {{$site->theme_color_primary}};
    color: #FAFAFA;
}

.bullete .bullete-rail {
    position: absolute;
    left: 0;
    height: 30px;
    width: 100%;
    z-index: 988;
    background-color: #F4F4F4;
    color: #1E1E1E;
}

/* --  Buttons  -- */

.main-btn, .white-btn, .outline-btn {
    display: inline-block;
    padding: 10px 35px;
    margin: 3px;
    border: 2px solid transparent;
    border-radius: 3px;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
}

.main-btn {
    background: {{$site->theme_color_primary}};
    color: #FFF;
}

.white-btn {
    background: #FFF;
    color: {{$site->theme_color_secondary}} !important;
}

.outline-btn {
    background: transparent;
    color: {{$site->theme_color_primary}} !important;
    border-color: {{$site->theme_color_primary}};
}

.main-btn:hover, .white-btn:hover, .outline-btn:hover {
    opacity: 0.8;
}


/*------------------------------------*\
	Logo
\*------------------------------------*/

.navbar-brand {
    padding: 0;
}

.navbar-brand .logo, .navbar-brand .logo-alt {
    max-height: 50px;
    display: block;
}

#nav:not(.nav-transparent):not(.fixed-nav) .navbar-brand .logo-alt {
	display: none;
}

#nav.nav-transparent:not(.fixed-nav) .navbar-brand .logo {
	display: none;
}

#nav.fixed-nav .navbar-brand .logo-alt {
    display: none;
}

@media only screen and (max-width: 767px) {
    #nav.nav-transparent .navbar-brand .logo-alt {
        display: none !important;
    }
    #nav.nav-transparent .navbar-brand .logo {
        display: block !important;
    }
}


/*------------------------------------*\
	Navigation
\*------------------------------------*/

#nav {
    padding: 10px 0px;
    background: #FFF;
    -webkit-transition: 0.2s padding;
    transition: 0.2s padding;
    z-index: 999;
}

#nav.navbar {
    border: none;
    border-radius: 0;
    margin-bottom: 0px;
}

#nav.fixed-nav {
    position: fixed;
    left: 0;
    right: 0;
    padding: 0px 0px;
    background-color: #FFF !important;
    border-bottom: 1px solid #EEE;
}

#nav.nav-transparent {
    background: transparent;
}


/* -- default nav -- */

@media only screen and (min-width: 768px) {
    .main-nav li {
        padding: 0px 15px;
    }
    .main-nav li a {
        font-size: 14px;
        -webkit-transition: 0.2s color;
        transition: 0.2s color;
    }
    .main-nav>li>a {
        color: {{$site->theme_color_secondary}};
        padding: 15px 0px;
    }
    #nav.nav-transparent:not(.fixed-nav) .main-nav>li>a {
        color: #fff;
    }
    .main-nav>li>a:hover, .main-nav>li>a:focus, .main-nav>li.active>a {
        background: transparent;
        color: {{$site->theme_color_primary}};
    }
    .main-nav>li>a:after {
        content: "";
        display: block;
        background-color: {{$site->theme_color_primary}};
        height: 2px;
        width: 0%;
        margin: auto;
        -webkit-transition: 0.2s width;
        transition: 0.2s width;
    }
    .main-nav>li>a:hover:after, .main-nav>li.active>a:after {
        width: 100%;
    }
    /* dropdown */
    .has-dropdown {
        position: relative;
    }
    .has-dropdown>a:before {
        font-family: 'FontAwesome';
        content: "\f054";
        font-size: 6px;
        margin-left: 6px;
        float: right;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-transition: 0.2s transform;
        transition: 0.2s transform;
    }
    .dropdown {
        position: absolute;
        right: -50%;
        top: 0;
        background-color: {{$site->theme_color_primary}};
        width: 200px;
        -webkit-box-shadow: 0px 5px 5px -5px rgba(53, 64, 82, 0.2);
        box-shadow: 0px 5px 5px -5px rgba(53, 64, 82, 0.2);
        -webkit-transform: translateY(15px) translateX(50%);
        -ms-transform: translateY(15px) translateX(50%);
        transform: translateY(15px) translateX(50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }
    .main-nav>.has-dropdown>.dropdown {
        top: 100%;
        right: 50%;
    }
    .main-nav>.has-dropdown>.dropdown .dropdown.dropdown-left {
        right: 150%;
    }
    .dropdown li a {
        display: block;
        color: #FFF;
        border-top: 1px solid rgba(250, 250, 250, 0.1);
        padding: 10px 0px;
    }
    .dropdown li:nth-child(1) a {
        border-top: none;
    }
    .has-dropdown:hover>.dropdown {
        opacity: 1;
        visibility: visible;
        -webkit-transform: translateY(0px) translateX(50%);
        -ms-transform: translateY(0px) translateX(50%);
        transform: translateY(0px) translateX(50%);
    }
    .has-dropdown:hover>a:before {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    .nav-collapse {
        display: none;
    }
}


/* -- mobile nav -- */

@media only screen and (max-width: 767px) {
    #nav {
        padding: 0px 0px;
    }
    #nav.nav-transparent {
        background: #FFF;
    }
    .main-nav {
        position: fixed;
        right: 0;
        height: calc(100vh - 80px);
        -webkit-box-shadow: 0px 80px 0px 0px #1C1D21;
        box-shadow: 0px 80px 0px 0px #1C1D21;
        max-width: 250px;
        width: 0%;
        -webkit-transform: translateX(100%);
        -ms-transform: translateX(100%);
        transform: translateX(100%);
        margin: 0;
        overflow-y: auto;
        background: #1C1D21;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }
    #nav.open .main-nav {
        -webkit-transform: translateX(0%);
        -ms-transform: translateX(0%);
        transform: translateX(0%);
        width: 100%;
    }
    .main-nav li {
        border-top: 1px solid rgba(250, 250, 250, 0.1);
    }
    .main-nav li a {
        display: block;
        color: #FFF;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }
    .main-nav>li.active {
        border-left: 6px solid {{$site->theme_color_primary}};
    }
    .main-nav li a:hover, .main-nav li a:focus {
        background-color: {{$site->theme_color_primary}};
        color: #FFF;
        opacity: 1;
    }
    .has-dropdown>a:after {
        content: "\f054";
        font-family: 'FontAwesome';
        float: right;
        -webkit-transition: 0.2s -webkit-transform;
        transition: 0.2s -webkit-transform;
        transition: 0.2s transform;
        transition: 0.2s transform, 0.2s -webkit-transform;
    }
    .dropdown {
        opacity: 0;
        visibility: hidden;
        height: 0;
        background: rgba(250, 250, 250, 0.1);
    }
    .dropdown li a {
        padding: 6px 10px;
    }
    .has-dropdown.open-drop>a:after {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .has-dropdown.open-drop>.dropdown {
        opacity: 1;
        visibility: visible;
        height: auto;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }
}


/* -- nav btn collapse -- */

.nav-collapse {
    position: relative;
    float: right;
    width: 40px;
    height: 40px;
    margin-top: 5px;
    margin-right: 5px;
    cursor: pointer;
    z-index: 99999;
}

.nav-collapse span {
    display: block;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    left: 50%;
    width: 25px;
}

.nav-collapse span:before, .nav-collapse span:after {
    content: "";
    display: block;
}

.nav-collapse span, .nav-collapse span:before, .nav-collapse span:after {
    height: 4px;
    background: {{$site->theme_color_secondary}};
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.nav-collapse span:before {
    -webkit-transform: translate(0%, 10px);
    -ms-transform: translate(0%, 10px);
    transform: translate(0%, 10px);
}

.nav-collapse span:after {
    -webkit-transform: translate(0%, -14px);
    -ms-transform: translate(0%, -14px);
    transform: translate(0%, -14px);
}

#nav.open .nav-collapse span {
    background: transparent;
}

#nav.open .nav-collapse span:before {
    -webkit-transform: translateY(0px) rotate(-135deg);
    -ms-transform: translateY(0px) rotate(-135deg);
    transform: translateY(0px) rotate(-135deg);
}

#nav.open .nav-collapse span:after {
    -webkit-transform: translateY(-4px) rotate(135deg);
    -ms-transform: translateY(-4px) rotate(135deg);
    transform: translateY(-4px) rotate(135deg);
}


/*------------------------------------*\
	Header
\*------------------------------------*/

header {
    position: relative;
}

#home {
    height: 100vh;
}

#home .home-wrapper {
    position: absolute;
    left: 0px;
    right: 0px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    text-align: center;
}

.home-content h1 {
  text-transform: uppercase;
}
.home-content button {
  margin-top: 20px;
}

.header-wrapper h2 {
    display: inline-block;
    margin-bottom: 0px;
}


/*------------------------------------*\
	About
\*------------------------------------*/

.about {
    position: relative;
    text-align: center;
    padding: 40px 20px;
    border: 1px solid #EEE;
    margin: 15px 0px;
}

.about i {
    font-size: 36px;
    color: {{$site->theme_color_primary}};
    margin-bottom: 20px;
}

.about:after {
    content: "";
    background-color: #1C1D21;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 0%;
    z-index: -1;
    -webkit-transition: 0.2s width;
    transition: 0.2s width;
}

.about:hover:after {
    width: 100%;
}

.about h3 {
    -webkit-transition: 0.2s color;
    transition: 0.2s color;
}

.about:hover h3 {
    color: #fff;
}


/*------------------------------------*\
	Portfolio
\*------------------------------------*/

.work {
    position: relative;
    padding: 20px;
}

.work>img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}

.work .overlay {
    background: {{$site->theme_color_secondary}};
    position: absolute;
    /* top: 0px; */
    left: 0px;
    /* right: 0px; */
    bottom: 0px;
    opacity: 0;
    width : 0%;
    height : 0%;
    -webkit-transition: 0.2s;
    transition: 0.2s;
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
}

.work:hover .overlay {
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    width: 100%;
    height: 100%;
    opacity: 0.8;
}

.work .work-content {
    position: absolute;
    left: 25px;
    right: 25px;
    top: 50%;
    text-align: center;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.work .work-content h3 {
    -webkit-transform: translateY(100%);
    -ms-transform: translateY(100%);
    transform: translateY(100%);
    opacity: 0;
    color: #FFF;
    margin-bottom: 10px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    -webkit-transition-delay: 0.1s;
    transition-delay: 0.1s;
}

.work:hover .work-content h3 {
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    transform: translateY(0%);
    opacity: 1;
    -webkit-transition-delay: 0.1s;
    transition-delay: 0.1s;
}

.work .work-content span {
    display: block;
    text-transform: uppercase;
    -webkit-transform: translateY(100%);
    -ms-transform: translateY(100%);
    transform: translateY(100%);
    opacity: 0;
    color: {{$site->theme_color_primary}};
    margin-bottom: 5px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
}

.work:hover .work-content span {
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    transform: translateY(0%);
    opacity: 1;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
}

.work .work-link {
    text-align: center;
    margin-top: 20px;
    opacity: 0;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
}

.work .work-link a {
    display: inline-block;
    width: 50px;
    height: 50px;
    background-color: {{$site->theme_color_primary}};
    color: #FFF;
    line-height: 50px;
    text-align: center;
}

.work:hover .work-link {
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
    opacity: 1;
}


/*------------------------------------*\
	Services
\*------------------------------------*/

.service {
    position: relative;
    padding: 40px 20px 40px 70px;
    margin: 15px 0px;
    border: 1px solid #EEE;
}

.service i {
    position: absolute;
    left: 20px;
    text-align: center;
    font-size: 32px;
    color: {{$site->theme_color_primary}};
    border-radius: 50%;
}

.service:after {
    content: "";
    background-color: #1C1D21;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 0%;
    z-index: -1;
    -webkit-transition: 0.2s width;
    transition: 0.2s width;
}

.service:hover:after {
    width: 100%;
}

.service h3 {
  -webkit-transition: 0.2s color;
  transition: 0.2s color;
}

.service:hover h3 {
    color: #fff;
}

/*------------------------------------*\
	Why choose us
\*------------------------------------*/

.feature {
    margin: 15px 0px;
}
.feature i {
    float: left;
    padding: 5px;
    border-radius: 50%;
    color: {{$site->theme_color_primary}};
    border: 1px solid {{$site->theme_color_primary}};
    margin-right: 5px;
}

/*------------------------------------*\
	Numbers
\*------------------------------------*/

.number {
    text-align: center;
    margin: 15px 0px;
}

.number i {
    color: {{$site->theme_color_primary}};
    font-size: 36px;
    margin-bottom: 20px;
}

.number h3 {
    font-size: 36px;
    margin-bottom: 10px;
}


/*------------------------------------*\
	Pricing
\*------------------------------------*/

.pricing {
    position: relative;
    text-align: center;
    border: 1px solid #EEE;
    background-color: #FFF;
    z-index: 11;
    margin: 15px 0px;
}

.pricing::after {
    content: "";
    background-color: #1C1D21;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    height: 0%;
    z-index: -1;
    -webkit-transition: 0.2s height;
    transition: 0.2s height;
}

.pricing:hover:after {
    height: 100%;
}

.pricing .price-head {
    position: relative;
    margin-bottom: 20px;
}

.pricing .price-title {
    display: block;
    padding: 40px 0px 20px;
    text-transform: uppercase;
    -webkit-transition: 0.2s color;
    transition: 0.2s color;
}

.pricing:hover .price-title {
    color: {{$site->theme_color_primary}};
}

.pricing .price {
    position: relative;
    width: 140px;
    height: 140px;
    line-height: 140px;
    text-align: center;
    margin: auto;
    border-radius: 50%;
    border: 2px solid {{$site->theme_color_primary}};
}

.pricing .price h3 {
  font-size: 42px;
  margin: 0px;
  -webkit-transition: 0.2s color;
  transition: 0.2s color;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  top: 50%;
  position: absolute;
  left: 0;
  right: 0;
}

.pricing:hover .price h3 {
    color: #fff;
}

.pricing .duration {
    display: block;
    font-size: 14px;
    text-transform: uppercase;
    color: {{$site->theme_color_secondary}};
    -webkit-transition: 0.2s color;
    transition: 0.2s color;
}

.pricing:hover .duration {
    color: #fff;
}

.pricing .price-btn {
    padding-top: 20px;
    padding-bottom: 40px;
}

/*------------------------------------*\
	Testimonial
\*------------------------------------*/

.testimonial {
    margin: 15px 0px;
}

.testimonial-meta {
    position: relative;
    padding-left: 90px;
    height: 70px;
    margin-bottom: 20px;
    padding-top: 10px;
}

.testimonial img {
    position: absolute;
    left: 0;
    top: 0;
    width: 70px !important;
    height: 70px !important;
    border-radius: 50%;
}

.testimonial h3 {
    margin-bottom: 5px;
}

.testimonial span {
    font-size: 14px;
    color: {{$site->theme_color_primary}};
    text-transform: uppercase;
}


/*------------------------------------*\
	Team
\*------------------------------------*/

.team {
    position: relative;
    background-color: #F4F4F4;
    padding: 40px 20px;
    margin: 15px 0px;
    height : 430px;
}

.team::after {
    content: "";
    background-color: #1C1D21;
    position: absolute;
    right: 0;
    top: 0;
    height: 0%;
    width: 0%;
    z-index: 1;
    -webkit-transition: 0.2s;
    transition: 0.2s;
}

.team:hover:after {
    height: 100%;
    width: 100%;
}

.team-img {
    position: relative;
    margin-bottom: 20px;
    z-index: 11;
}

.team-img>img {
    width: 253px;
    height: 253px;
    object-fit: cover;
}

.team .overlay {
    background: #1C1D21;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    opacity: 0;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
}

.team:hover .overlay {
    opacity: 0.8;
}

.team .team-content {
    text-align: center;
    position: relative;
    z-index: 11;
}

.team .team-content h3 {
    margin-bottom: 5px;
    -webkit-transition: 0.2s color;
    transition: 0.2s color;
}

.team .team-content span {
    font-size: 0.8em;
    text-transform: uppercase;
    -webkit-transition: 0.2s color;
    transition: 0.2s color;
}

.team:hover .team-content h3 {
    color: #FFF;
}

.team:hover .team-content span {
    color: {{$site->theme_color_primary}};
}

.team .team-social {
    position: absolute;
    bottom: 0;
    opacity: 1;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
    z-index: 11;
}

.team .team-social a {
    display: inline-block;
    width: 30px;
    line-height: 30px;
    margin-bottom: 10px;
    text-align: center;
    background-color: {{$site->theme_color_primary}};
    color: #FFF;
}

.team:hover .team-social {
    opacity: 1;
}


@media only screen and (max-width: 768px) {
    .team {
        height : 490px;
    }

    .team-img>img {
        width: 320px;
        height: 320px;
        object-fit: cover;
    }

}

/*------------------------------------*\
	Events
\*------------------------------------*/
.event {
    background-color: #FAFAFA;
    filter: drop-shadow(0px 0px 4px #CCCCCC);
    transition : all 0.2s;
}
.event:hover {
    filter: drop-shadow(0px 0px 7px #CCCCCC);
}

.event .event-links {
    position: relative;
    bottom: 0;
}

.event .event-links a {
    margin-right: 10px;
}

.event .event-meta li {
    display: inline-block;
    font-size: 14px;
    color: {{$site->theme_color_secondary}};
    margin-right: 10px;
}

.event .event-meta li i {
    color: {{$site->theme_color_primary}};
    margin-right: 5px;
}

.white-bar {
    background-color: #FAFAFA;
    filter: drop-shadow(0px 0px 1px #CCCCCC);
}

.masonry-grid {
    width: 32%;
}

.overlay-message {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
    text-transform: uppercase;
    opacity: 0.8;
}

@media (min-width: 320px) and (max-width: 480px) {
    .masonry-grid {
        width: 99%;
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
  
    .masonry-grid {
        width: 49%;
    }
}

@media (min-width: 768px) and (max-width: 1024px) and (orientation: ) {
  
    .masonry-grid {
        width: 32%;
    }
}
  
}
#event .poster {
    height: 300px;
    width: 100%;
    margin: 0;
    padding: 0;
    background-size: cover;
}

#event .fixed-div {
    background-color: #FAFAFA;
    filter: drop-shadow(0px 0px 1px #CCCCCC);
    margin-left: 5px;
    margin-right: 5px;
}

#event .event-accordion {
    background: {{$site->theme_color_primary}};
    padding: 10px;
    color: #FAFAFA;
}

#event .event-accordion h2{
    color: #FAFAFA;
    text-align: center;
}
#event .event-accordion p{
    color: #FAFAFA;
    text-align: center;
}

#event .bottom-link h3 {
    border-bottom: {{$site->theme_color_primary}} 2px solid;
}

#event #owl-slider .item img{
    display: block;
    width: 100%;
    height: 400px;
    overflow: hidden;
    object-fit:cover;
}

.card-image {
    height: 200px;
    object-fit: cover;
    width: 100%;
}

.blog {
    background-color: #FFF;
    margin: 15px 0px;
    filter: drop-shadow(0px 0px 4px #CCCCCC);
    transition: all 0.2s;
}

.blog:hover {
    filter: drop-shadow(0px 0px 7px #CCCCCC);
}

.blog .blog-content {
    padding: 20px 20px 40px;
}

.blog .blog-meta {
    margin-bottom: 20px;
}

.blog .blog-meta li {
    display: inline-block;
    font-size: 14px;
    color: {{$site->theme_color_secondary}};
    margin-right: 10px;
}

.blog .blog-meta li i {
    color: {{$site->theme_color_primary}};
    margin-right: 5px;
}

.ul-meta {
    text-align: right;
}

.ul-meta li {
    display: inline-block;
    font-size: 10px;
    color: {{$site->theme_color_secondary}};
    margin-right: 10px;
}

.ul-meta li i {
    color: {{$site->theme_color_primary}};
    margin-right: 5px;
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}


/*------------------------------------*\
	Blog post
\*------------------------------------*/
.blog-single {
    background-color: #FFF;
    margin: 15px 0px;
}

.blog-single .blog-meta {
    margin-bottom: 20px;
}

.blog-single .blog-meta li {
    display: inline-block;
    font-size: 14px;
    color: {{$site->theme_color_secondary}};
    margin-right: 10px;
}

.blog-single .blog-meta li i {
    color: {{$site->theme_color_primary}};
    margin-right: 5px;
}

#main .blog-single .blog-content {
    padding: 20px 20px 40px;
}

#main .blog-single {
  margin-top: 0px;
}

.blog-author {
    margin: 40px 0px;
}

.blog-author .media .media-left {
    padding-right: 20px;
}

.blog-author .media {
    padding: 20px;
    border: 1px solid #EEE;
}

.blog-author .media .media-object {
    width: 50px;
    display: inline-block;
}

.blog-author .media .media-heading h3 {

    text-transform: uppercase;
}

.blog-author .media .media-heading .author-social {
  float: right;
}

.blog-author .author-social a {
    display: inline-block;
    width: 24px;
    height: 24px;
    text-align: center;
    line-height: 24px;
    border-radius: 3px;
    margin-left: 5px;
    color: #FFF;
    background-color: {{$site->theme_color_primary}};
}


#aside .widget {
    margin-bottom: 40px;
}

.widget h3 {
  text-transform: uppercase;
}


/* -- posts sidebar -- */

.widget-post {
    min-height: 70px;
    margin-bottom: 25px;
}

.widget-post img {
    display: block;
    float: left;
    margin-right: 10px;
    margin-top: 5px;
}

.widget-post a {
    display: block;
    color: {{$site->theme_color_secondary}};
}

.widget-post a:hover {
    color: {{$site->theme_color_primary}};
}

.widget-post .blog-meta {
    display: inline-block;
}

.widget-post .blog-meta li {
    display: inline-block;
    margin-right: 5px;
    color: {{$site->theme_color_primary}};
    font-size: 12px;
}

.widget-post li i {
    color: {{$site->theme_color_primary}};
    margin-right: 5px;
}

#profile .table tr,
#profile .table th,
#profile .table td {
    border: none;
}

#profile .table td {
    font-size: 12px;
}

#profile .social-links {
    position: relative;
    bottom: 0;
    text-align: center;
}

#profile .social-links a {
    width: 30px;
    height: 30px;
    text-align: center;
    color: #FFFFFF;
    padding: 2px;
    margin: 2px;
    display: inline-block;
    background-color: {{$site->theme_color_primary}};
}



/*------------------------------------*\
	Contact
\*------------------------------------*/

.contact {
    margin: 15px 0px;
    text-align: center;
}

.contact i {
    font-size: 36px;
    color: {{$site->theme_color_primary}};
    margin-bottom: 20px;
}

.base-form {
    text-align: center;
    margin-top: 40px;
}

.base-form .input {
    margin-bottom: 20px;
}


.base-form .input:nth-child(1), .base-form .input:nth-child(2) {
    width: calc(50% - 10px);
}

.base-form .input:nth-child(2) {
    margin-left: 15px;
}

.side-form {
    text-align: left;
    margin-top: 40px;
}

.side-form label {
    margin-left: 5px;
    margin-bottom: 20px;
    display: block;
}

.side-form .input {
    margin-bottom: 20px;
}

/*------------------------------------*\
	Footer
\*------------------------------------*/

#footer {
    position: relative;
}

.footer-logo {
    text-align: justify;
    margin-bottom: 40px;
}

.footer-logo>a>img {
    width: 100%;
    max-height: 80px;
}

.footer-follow {
    margin-top: 30px;
    text-align: center;
    margin-bottom: 20px;
}

.footer-follow li {
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 13px;
}

.footer-follow li a {
  display: inline-block;
  width: 25px;
  height: 25px;
  line-height: 25px;
  text-align: center;
  border-radius: 3px;
  background-color: {{$site->theme_color_primary}};
  color:#FFF;
}

.footer-copyright {
    bottom: -130px;
    position: absolute;
}

.footer-copyright p {
    text-align: center;
    font-size: 14px;
    margin: 0;
}

.footer-heading {
    margin-bottom: 20px;
}

.footer-heading p{
    font-size: 20px;
    font-weight: 400;
    color: #EEE;
    border-bottom: #868F9B 1px solid;
}


/*------------------------------------*\
	Responsive
\*------------------------------------*/


@media only screen and (max-width: 991px) {}

@media only screen and (max-width: 767px) {
  .section-header h2.title {
  		font-size:31.5px;
	}

  .main-btn , .default-btn , .outline-btn , .white-btn  {
  		padding: 8px 22px;
  		font-size:14px;
	}

  .home-content h1 {
		font-size:36px;
	}

  .header-wrapper {
      display: none;
  }

  .footer-copyright {
        bottom: -50px;
        position: absolute;
    }

    .footer-heading p, .footer-heading>ul>li{
        text-align: center;
    }
}

@media only screen and (max-width: 480px) {
  #portfolio [class*='col-xs'] {
		  width:100%;
	}

  #numbers [class*='col-xs'] {
		  width:100%;
	}

  .contact-form .input:nth-child(1), .contact-form .input:nth-child(2) {
      width: 100%;
  }
  .contact-form .input:nth-child(2) {
      margin-left: 0px;
  }

  .reply-form form .input, .reply-form form .input {
      width: 100%;
  }
  .reply-form form .input:nth-child(2) {
      margin-left: 0px;
  }



  .blog-author .media .media-left {
      display: block;
      padding-right: 0;
      margin-bottom: 20px;
  }
  .blog-author .media {
      text-align: center;
  }
  .blog-author .media .media-heading .author-social {
      margin-top: 10px;
      float: none;
  }
  .blog-author .media .media-left img {
      margin: auto;
  }

  .blog-comments .media .media {
      margin:0px -15px;
  }
}



/*------------------------------------*\
	Owl theme
\*------------------------------------*/

/* -- dots -- */

.owl-theme .owl-dots .owl-dot span {
    border: none;
    background: #EEE;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.owl-theme .owl-dots .owl-dot:hover span {
    background: {{$site->theme_color_primary}};
}
.owl-theme .owl-dots .owl-dot.active span {
	  background: {{$site->theme_color_primary}};
	  width:20px;
}

/* -- nav -- */

.owl-theme .owl-nav {
    opacity: 0;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
}

.owl-theme:hover .owl-nav {
    opacity: 1;
}

.owl-theme .owl-nav [class*='owl-'] {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
            transform: translateY(-50%);
    background: {{$site->theme_color_primary}};
    color: #FFF;
  	padding: 0px;
  	width: 50px;
  	height: 50px;
  	border-radius:3px;
  	line-height: 50px;
  	margin: 0;
}

.owl-theme .owl-prev {
    left: 0px;
}

.owl-theme .owl-next {
    right: 0px;
}

.owl-theme .owl-nav [class*='owl-']:hover {
    opacity: 0.8;
    background: {{$site->theme_color_primary}};
}


/*------------------------------------*\
	Back to top
\*------------------------------------*/

#back-to-top {
  	display:none;
  	position: fixed;
  	bottom: 20px;
  	right: 20px;
  	width: 50px;
  	height: 50px;
  	line-height: 50px;
  	text-align: center;
  	background: {{$site->theme_color_primary}};
  	border-radius:3px;
  	color: #FFF;
  	z-index: 9999;
    -webkit-transition: 0.2s opacity;
    transition: 0.2s opacity;
  	cursor: pointer;
}

#back-to-top:after {
    content: "\f106";
    font-family: 'FontAwesome';
}

#back-to-top:hover {
    opacity: 0.8;
}

/*------------------------------------*\
	Preloader
\*------------------------------------*/


#preloader {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background-color: #FFF;
    z-index: 99999;
}

.preloader {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
}
.preloader span {
    display: inline-block;
    background-color: {{$site->theme_color_primary}};
    width: 25px;
    height: 25px;
    -webkit-animation: 1s preload ease-in-out infinite;
            animation: preload 1s ease-in-out infinite;
    -webkit-transform: scale(0);
        -ms-transform: scale(0);
            transform: scale(0);
    border-radius:50%;
}

.preloader span:nth-child(1) {
    -webkit-animation-delay: 0s;
            animation-delay: 0s;
}

.preloader span:nth-child(2) {
    -webkit-animation-delay: 0.1s;
            animation-delay: 0.1s;
}

.preloader span:nth-child(3) {
    -webkit-animation-delay: 0.15s;
            animation-delay: 0.15s;
}

.preloader span:nth-child(4) {
    -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
}

@-webkit-keyframes preload {
	0% {
	   -webkit-transform:scale(0);
	           transform:scale(0);
	}
  50% {
    -webkit-transform:scale(1);
            transform:scale(1);
  }
  100% {
    -webkit-transform:scale(0);
            transform:scale(0);
  }
}

@keyframes preload {
	0% {
	   -webkit-transform:scale(0);
	           transform:scale(0);
	}
  50% {
    -webkit-transform:scale(1);
            transform:scale(1);
  }
  100% {
    -webkit-transform:scale(0);
            transform:scale(0);
  }
}

</style>