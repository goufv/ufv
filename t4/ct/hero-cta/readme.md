# 2. Content box with background image, text box, green CTA button

Can we create one content type that will go edge-to-edge on the full-width layout and then full column width on a typical inner-page layout?

## Working files

ct-hero-cta.html

t4 - Hero + CTA

https://myweb.ufv.ca/terminalfour/SiteManager?ctfn=hierarchy&fnno=10&nNS1=0&ddm=1&dl=1&sid=264420



### Full Width
```
<section class="section-hero-full">
  <div class="ct-hero-cta">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-push-6 col-banner"></div>
        <div class="col-md-6 uc1 col-lg-pull-6 vcenter col-content">
          <h1>Customize Your Experience</h1>
          <p>Do you already have a place in mind where you would like to take your practicum? Connect with us and
            customize your practicum experience!</p>
            <a href="" alt="Tell Us More"><button class="btn-change">Tell Us More</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
```

### 2 column
```
<!-- ct-hero-cta -->
<section class="section-hero-2col">
  <div class="ct-hero-cta hero-2col">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-push-6 col-banner"></div>
        <div class="col-md-6 uc1 col-lg-pull-6 vcenter col-content">
          <h1>Customize Your Experience</h1>
          <p>Do you already have a place in mind where you would like to take your practicum? Connect with us and
            customize your practicum experience!</p>
          <button class="btn-change">Tell Us More</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / ct-hero-cta -->
```



Needs:
1. uploadable background image
2. Text box (LH placement - we may need to play with width)
translucent background
3. header field (white text)
4. teaser field (white text)
5. dark green CTA button link field

On mobile:
1. Layout should shift so image is full-width at top
2. Text box drops below image, goes to 100% width
3. What should background color or text box be on mobile?? Dark grey??

<img src="2-1.png">
<img src="2-2.png">
<img src="banner.jpeg">
<img src="demo-home.jpg">
<img src="demo-page.jpg">