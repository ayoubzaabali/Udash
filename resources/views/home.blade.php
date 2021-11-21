@extends('layouts.homePage')

@section('main')
<div id="firstSection">
    <div class="container">
        <nav>
            <div id="logo">UDASH</div>
            <div id="navbar">
                <ul>
                    <li>Discover</li>
                    <li>Our Plans</li>
                    <li>Contact Us</li>
                    <li>About Us</li>
                </ul>
            </div>
            <div id="button"><button>Sign-in</button></div>
        </nav>
    </div>
    <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 150" version="1.1"
        xmlns="http://www.w3.org/2000/svg">
        <path style="transform:translate(0, 0px); opacity:1" fill="#fff"
            d="M0,75L12,65C24,55,48,35,72,42.5C96,50,120,85,144,102.5C168,120,192,120,216,120C240,120,264,120,288,100C312,80,336,40,360,35C384,30,408,60,432,67.5C456,75,480,60,504,65C528,70,552,95,576,107.5C600,120,624,120,648,122.5C672,125,696,130,720,117.5C744,105,768,75,792,60C816,45,840,45,864,57.5C888,70,912,95,936,97.5C960,100,984,80,1008,60C1032,40,1056,20,1080,10C1104,0,1128,0,1152,22.5C1176,45,1200,90,1224,95C1248,100,1272,65,1296,62.5C1320,60,1344,90,1368,102.5C1392,115,1416,110,1440,95C1464,80,1488,55,1512,50C1536,45,1560,60,1584,60C1608,60,1632,45,1656,45C1680,45,1704,60,1716,67.5L1728,75L1728,150L1716,150C1704,150,1680,150,1656,150C1632,150,1608,150,1584,150C1560,150,1536,150,1512,150C1488,150,1464,150,1440,150C1416,150,1392,150,1368,150C1344,150,1320,150,1296,150C1272,150,1248,150,1224,150C1200,150,1176,150,1152,150C1128,150,1104,150,1080,150C1056,150,1032,150,1008,150C984,150,960,150,936,150C912,150,888,150,864,150C840,150,816,150,792,150C768,150,744,150,720,150C696,150,672,150,648,150C624,150,600,150,576,150C552,150,528,150,504,150C480,150,456,150,432,150C408,150,384,150,360,150C336,150,312,150,288,150C264,150,240,150,216,150C192,150,168,150,144,150C120,150,96,150,72,150C48,150,24,150,12,150L0,150Z">
        </path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="579" height="579" viewBox="0 0 579 579">
  <defs>
    <filter id="Rectangle_526" x="0" y="0" width="579" height="579" filterUnits="userSpaceOnUse">
      <feOffset dy="31" input="SourceAlpha"/>
      <feGaussianBlur stdDeviation="13" result="blur"/>
      <feFlood flood-opacity="0.161"/>
      <feComposite operator="in" in2="blur"/>
      <feComposite in="SourceGraphic"/>
    </filter>
  </defs>
  <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectangle_526)">
    <g id="Rectangle_526-2" data-name="Rectangle 526" transform="translate(39 8)" fill="#fff" stroke="rgba(254,88,88,0.25)" stroke-width="6">
      <rect width="501" height="501" rx="18" stroke="none"/>
      <rect x="3" y="3" width="495" height="495" rx="15" fill="none"/>
    </g>
  </g>
</svg>

</div>
@endsection