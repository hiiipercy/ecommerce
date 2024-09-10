<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.header')
    <style>
      .icons {
          position: relative;
          display: inline-block;
          text-decoration: none;
      }

      #notification-badge {
          position: absolute;
          top: 15px;
          right: -10px;
          background-color: red;
          color: white;
          border-radius: 50%;
          padding: 2px 6px;
          font-size: 12px;
          font-weight: bold;
      }
      /* .ratting {
        min-height: 50vh;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        background: hsl(137, 46%, 24%);
        font-family: "Poppins", sans-serif;
        } */
        .card {
        background: #fff;
        margin: 0 1rem;
        width: 100%;
        border-radius: 0.5rem;
        display: contents;
        }




        .star {
    font-size: 2em; /* Size of stars */
    color: lightgray; /* Default star color */
    cursor: pointer;
    transition: color 0.2s; /* Smooth transition for color change */
}

.star.selected {
    color: gold; /* Color of selected stars */
}

.card {
    display: contents;
}

.card .star:hover,
.card .star.selected {
    color: gold; /* Color of stars on hover */
}

  </style>
  @stack('style')
</head>

<body>
  <!--================Header Menu Area =================-->
  @include('frontend.include.navbar')
  <!--================Header Menu Area =================-->

  @yield('content')

  <!--================ start footer Area  =================-->
  @include('frontend.include.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
          class="bi bi-arrow-up-short"></i></a>
  <!--================ End footer Area  =================-->

  <!--================ start script Area  =================-->
  @include('frontend.include.script')
  <!--================ End script Area  =================-->
  
</body>

</html>