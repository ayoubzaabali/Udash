@extends('layouts.homePage')

@section('main')
<div class="up">Collaborate in real-time, in any document, from anywhere
    . <a href="{{Route('login')}}">Check Now!</a></div>
<div id="firstSection">
    <div class="container">
        <nav>
            <div id="logo">Udash</div>
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
            d="M0,320L40,293.3C80,267,160,213,240,202.7C320,192,400,224,480,213.3C560,203,640,149,720,128C800,107,880,117,960,138.7C1040,160,1120,192,1200,208C1280,224,1360,224,1400,224L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>

    <div class="first-content">
        <div class="container content">
            <h5>Udash</h5>
            <h2>It’s Time To Give Your Business</h2>
            <h1>A Futuristic Spin</h1>
            <h3>Host Any Software On Our Secured Cloud Now</h3>
            <div class="btns">
                <button>Try for Free</button>
                <button>See Plans & Offers</button>
            </div>
        </div>
        <div class="guys">
            <img src="{{asset('assets/media/image/men1.png')}}" alt="image not found">
        </div>
    </div>

    <div id="img-list">
        <h4>Trusted By :</h4>
        <img src="{{asset('assets/media/image/company/img1.png')}}" alt="image not found">
        <img src="{{asset('assets/media/image/company/img2.png')}}" alt="image not found">
        <img src="{{asset('assets/media/image/company/img3.png')}}" alt="image not found">
        <img src="{{asset('assets/media/image/company/img4.png')}}" alt="image not found">
        <img src="{{asset('assets/media/image/company/img5.png')}}" alt="image not found">
    </div>

</div>



<!-- why us -->
<div id="section2">

    <div class="container">

        <h1 class="h1">Why Using <span>Udash?</span></h1>
        <div class="content">

            <div>

                <ul>
                    <li>Always On support</li>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam consectetur iusto quia
                        dignissimos tempore accusamus maxime in, eligendi quod, eius ea voluptatibus incidunt neque
                        voluptatum eos doloribus eveniet veritatis ipsam aspernatur? Iusto non pariatur dolor.</p>
                </ul>

            </div>
            <div><img id="img" src="{{asset('assets/media/image/cloud.png')}}" alt=""></div>
        </div>
    </div>
</div>

<!-- end why us -->



<!-- testimonials section -->

<div id="section4">

    <svg class="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,160L720,128L1440,160L1440,0L720,0L0,0Z"></path>
    </svg>


        <div class="testimonials-section">
        <h1 style="position:absolute;top:0;" class="h1">Customer <span style="color:#fff">Testimonials</span></h1>

            <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav" />
            <input type="radio" name="slider" title="slide2" class="slider__nav" />
            <input type="radio" name="slider" title="slide3" class="slider__nav" />
            <input type="radio" name="slider" title="slide4" class="slider__nav" />
            <input type="radio" name="slider" title="slide5" class="slider__nav" />
            <div class="slider__inner">
                <div class="slider__contents">
                    <quote>&rdquo;</quote>
                    <p class="slider__txt">We love you guys. It's easy to order, we get shipments quick and my rep
                        solves tough
                        problems the right way. We get answers that work.</p>
                    <h2 class="slider__caption">Rhonda | NylonCraft</h2>
                </div>
                <div class="slider__contents">
                    <quote>&rdquo;</quote>
                    <p class="slider__txt">You all bend over backwards to get it done. Inside sales and the Account
                        Managers are
                        great! It's your service...you all know that it's not just about taking orders it's about
                        service. Why
                        do we choose you guys - your people, your prices, you're quick and you have a ton of technical
                        knowledge.</p>
                    <h2 class="slider__caption">Jared | Rexam</h2>
                </div>
                <div class="slider__contents">
                    <quote>&rdquo;</quote>
                    <p class="slider__txt">It's the long-term relationship we have with Proheat that keeps me calling
                        you guys.
                        I trust you, you're quick, and everybody I've ever spoken to there are all great people. Our
                        CEO, Bill,
                        talks about building relationships. That's exactly what Proheat does, and I couldn't be happier.
                    </p>
                    <h2 class="slider__caption">Chris | C&M Fine Pack</h2>
                </div>
                <div class="slider__contents">
                    <quote>&rdquo;</quote>
                    <p class="slider__txt">You answer my questions, always takes care of problems, and I never have a
                        hassle.
                    </p>
                    <h2 class="slider__caption">Rex | LNP Engineering Plastics</h2>
                </div>
                <div class="slider__contents">
                    <quote>&rdquo;</quote>
                    <p class="slider__txt">Proheat's staff are all so friendly and everybody goes above and beyond.
                        Everyone is
                        courteous, everything is quick and you get us what we need. I have to shop around for everything
                        and we
                        ALWAYS come back to Proheat.</p>
                    <h2 class="slider__caption">Darlene | Russel Stover</h2>
                </div>
            </div>
        </div>
    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,160L720,128L1440,160L1440,320L720,320L0,320Z"></path>
    </svg>
</div>
<!-- end testimonials section -->



<!-- question section -->

<div id="section3">
    <div class="container">
        <h1 class="h1">Any Questions For <span>US?</span></h1>
        <div class="content">
            <div class="one"></div>
            <div class="two">

            </div>
            <div class="tree"></div>
        </div>
    </div>
</div>
<!-- question section end -->


<!-- contact us section -->
<div class="container">
    <div style="text-align:center">
        <h1 class="h1">Contact Us</h1>
        <p>Swing by for a cup of coffee, or leave us a message:</p>
    </div>
    <div class="row">
        <div class="column">
            <img src="{{asset('assets/media/image/map.jpg')}}" style="width:100%">
        </div>
        <div class="column">
            <form action="/action_page.php">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<!-- end contact us section -->
@endsection