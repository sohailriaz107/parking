<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
@foreach ($datas as $data1)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Finding parking has never been easier! With <span style="color: green;">Sparkify</span>, I can reserve my spot in seconds. The real-time updates are a lifesaver!</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>{{ $data1->name }}</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div>
            @endforeach
</body>

</html>