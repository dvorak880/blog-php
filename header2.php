<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
    function throttle(fn, delay) {
  let last;
  let timer;

  return () => {
    const now = +new Date;

    if (last && now < last + delay) {
      clearTimeout(timer);

      timer = setTimeout(() => {
        last = now;
        fn();
      }, delay);
    } else {
      last = now;
      fn();
    }

  };
}

function onScroll() {
  if (window.pageYOffset) {
    $$header.classList.add('is-active');
  } else {
    $$header.classList.remove('is-active');
  }
}

const $$header = document.querySelector('.js-header');

window.addEventListener('scroll', throttle(onScroll, 25));
</script>
    <style>
    @use postcss-cssnext;

/* helpers/grid.css */

.grid {
  margin-left: auto;
  margin-right: auto;
  max-width: 48em;
  width: 90%;
}

/* helpers/sticky.css */

.sticky {
  position: sticky;
  will-change: transform;
}

.sticky--top {
  top: 0;
}

/* layout/base.css */

* {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  height: 100%;
}

body {
  font-family: 'Roboto', sans-serif;
  line-height: 1.75;
  margin: 0;
  min-height: 100%;
}

/* layout/header.css */

.header {
  background-color: #fff;
  padding-bottom: 1em;
  padding-top: 1em;
}


.header::after {
  bottom: 0;
  box-shadow: 0 0.0625em 0.5em rgba(0, 0, 0, 0.3);
  content: '';
  left: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: opacity 0.3s;
  z-index: -1;
}

.header.is-active::after {
  opacity: 1;
}

/* layout/main.css */

.main {
  padding-top: 6em;
  padding-bottom: 6em;
}

/* modules/headline.css */

h1 {
  margin-bottom: 1.5em;
  margin-top: 0;
}

/* modules/navigation.css */

.navigation a {
  color: inherit;
  display: block;
  text-decoration: none;
}

.navigation .is-active {
  background-color: #000;
  color: #fff;
  padding-left: 1em;
  padding-right: 1em;
  border-radius: 999px;
}

.navigation__list {
  list-style: none;
  margin: -0.5em;
  padding: 0;
}

.navigation__list--inline {
  display: flex;
}

.navigation__item {
  margin: 0.5em;
}

/* modules/paragraph.css */

p {
  margin-bottom: 1.5em;
  margin-top: 1.5em;
}
</style>
</head>
<body>
<header class="header sticky sticky--top js-header">

<div class="grid">

  <nav class="navigation">
    <ul class="navigation__list navigation__list--inline">
      <li class="navigation__item"><a href="#" class="is-active">Home</a></li>
      <li class="navigation__item"><a href="#">About Us</a></li>
      <li class="navigation__item"><a href="#">Work</a></li>
      <li class="navigation__item"><a href="#">Clients</a></li>
      <li class="navigation__item"><a href="#">Contact</a></li>
    </ul>
  </nav>

</div>

</header>


</body>
</html>