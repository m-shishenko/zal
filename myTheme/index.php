<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); bloginfo('description'); ?></title>
    <link
      rel="preload"
      href="<?php  echo bloginfo("template_url"); ?>/assets/fonts/HelveticaNeueCyr-Roman.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="<?php  echo bloginfo("template_url"); ?>/assets/fonts/HelveticaNeueCyr-Bold.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="<?php  echo bloginfo("template_url"); ?>/assets/fonts/HelveticaNeueCyr-Black.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <?php 
      wp_head();
    ?>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header__wrapper">
          <div class="header__logo">
            <p>Arena</p>
            <p>г. Кривой Рог, 95 кв ул. Волосевича 1е</p>
          </div>
          <div class="header__inner">
            <nav class="header__menu">
            
              <?php
                wp_nav_menu( [
                  'menu'            => 'Главное меню', 
                  'container'       => false,
                  'menu_class'      => 'header__list',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'items_wrap'      => '<ul class="header__list">%3$s</ul>',
                  'depth'           => 1,
                ] );
              ?>

            </nav>
            <ul class="header__social">
              <li>
                <a href="<?php the_field('ssylka_instagram'); ?>" target="_blank">
                  <img
                    src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/insta.svg"
                    alt="icons-social"
                    class="header__social-img"
                  />
                </a>
              </li>
              <li>
                <a href="<?php the_field('nomer_telefona'); ?>" target="_blank">
                  <img
                    src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/tel.svg"
                    alt="icons-social"
                    class="header__social-img"
                  />
                </a>
              </li>
            </ul>
          </div>
          <div class="header__wrapper-btn">
            <a href="#contacts" class="button header__btn"><?php the_field('tekst_knopki_zapisatsya'); ?></a>
            <button class="button_burger">
              <span></span>
            </button>
          </div>
        </div>
      </div>
    </header>
    <main class="main">
      <section id="top" class="banner">
        <div class="container">
          <div class="banner__wrapper">
            <p class="banner__person"><?php the_field('opisanie'); ?></p>
            <h1 class="banner__title">
              <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/workout.svg" alt="title" />
            </h1>
            <div class="banner__subtitle">
              <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/allday.svg" alt="subtitle" />
            </div>
            <a href="#welcome" class="banner__btn">
              <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/arrowD.svg" alt="arrowD" />
            </a>
            <div class="banner__inner-address">
              <div class="banner__time"><?php the_field('vremya_raboty'); ?></div>
              <div class="banner__address">
              <?php the_field('adres'); ?>
                <a href="#contacts" class="banner__map">Открыть карту</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="welcome" class="welcome">
        <div class="container">
          <div class="welcome__row">
            <div class="welcome__row-item">
              <div class="welcome__title">
                <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/welcome/arena.svg" alt="arena" />
              </div>
              <p class="welcome__text">
                <?php the_field('zagolovok'); ?>
              </p>
              <p class="welcome__descr">
                <?php the_field('opisanie_s2'); ?>
              </p>
            </div>
            <div class="welcome__row-item">
              <p class="welcome__peoples">
                <?php the_field('lyudi'); ?>
              </p>
            </div>
          </div>
        </div>
      </section>
      <section id="workouts" class="workouts">
        <div class="container">
          <h2 class="title workouts__title"><?php the_field('zagolovok_1'); ?></h2>
          <div class="workouts__row">
            <div class="workouts__row-item">
              <p class="workouts__text">
                <?php the_field('opisanie_1'); ?>
              </p>
              <p class="workouts__descr">
                <?php the_field('opisanie_2'); ?> 
              </p>
            </div>
            <div class="workouts__row-item">
              <div class="workouts__row-btns">
                <button class="workouts__row-btns-l">
                  <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/workouts/ArrowL.svg" alt="arrow" />
                </button>
                <button class="workouts__row-btns-r">
                  <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/workouts/ArrowR.svg" alt="arrow" />
                </button>
              </div>
              <?php
              $items = get_field('slajder');
              if($items): ?>
                <ul class="workouts__slider">
                  <?php 
                  foreach($items as $item): ?>
                  <li class="workouts__slider-item">
                    <div class="workouts__slider-box">
                      <?php echo $item['tekst_slajda'] ?>
                    </div>
                    <div class="workouts__slider-wrapper">
                      <div>
                        <img src="<?php echo $item['kartinka-1'] ?>" alt="img" />
                      </div>
                      <div>
                        <img src="<?php echo $item['kartinka-2'] ?>" alt="img" />
                      </div>
                      <div>
                        <img src="<?php echo $item['kartinka-3'] ?>" alt="img" />
                      </div>
                      <div>
                        <img src="<?php echo $item['kartinka-4'] ?>" alt="img" />
                      </div>
                    </div>
                  </li>
                  <?php
                  endforeach;
                  ?>
                </ul>
              <?php
              endif ?>
            </div>
          </div>
        </div>
      </section>
      <section id="description" class="description">
        <div class="container">
          <div class="description__row">
            <div class="description__row-item">
              <p class="description__title">
                <?php the_field('zagolovok-2'); ?>
              </p>
              <img
                src="<?php the_field('kartinka-1_1'); ?>"
                alt="img"
                class="description__img1"
              />
              <p class="description__img-descr">
                <?php the_field('opisanie_kartinki-1'); ?>
              </p>
              <p class="description__slogan">
                <?php the_field('paragraf-1'); ?>
              </p>
            </div>
            <div class="description__row-item">
              <p class="description__title">
                <?php the_field('zagolovok-2'); ?>
              </p>
              <img
                src="<?php the_field('kartinka-1_2'); ?>"
                alt="img"
                class="description__img2"
              />
              <p class="description__img-descr">
                <?php the_field('opisanie_kartinki-2'); ?>
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="advantages">
        <div class="container">
        <?php
        $items = get_field('preimushhestva');
        if($items): ?>
          <ul class="advantages__list">
            <?php 
            foreach($items as $item): ?>
            <li class="advantages__item">
              <img
                src="<?php echo $item['img'] ?>"
                alt="icons"
                class="advantages__img"
              />
              <p class="advantages__descr">
                <?php echo $item['desccr_kartinki'] ?>
              </p>
            </li>
            <?php
            endforeach;
            ?>
          </ul>
        <?php
        endif ?>
        </div>
      </section>
      <section id="trainers" class="trainers">
        <div class="container">
          <h2 class="title trainers__title"><?php the_field('trainers_title'); ?></h2>
          <div class="swiper-container trainers__sliders">
            <?php
            $items = get_field('trainers_sliders-inner');
            if($items): ?>
              <ul class="swiper-wrapper trainers__sliders-inner">
                <?php 
                foreach($items as $item): ?>
                <li class="swiper-slide trainers__item">
                  <div class="trainers__slide">
                    <img src="<?php echo $item['trainers_slide'] ?>" alt="img" />
                  </div>
                  <div class="trainers__slide-text">
                    <p class="trainers__name">
                      <?php echo $item['trainers_name'] ?>
                    </p>
                    <p class="trainers__sport">
                      <?php echo $item['trainers_sport'] ?>
                    </p>
                  </div>
                </li>
                <?php
                endforeach;
                ?>
              </ul>
            <?php
            endif ?>
          </div>
        </div>
      </section>
      <section id="season" class="season">
        <div class="container">
          <h2 class="title season__title"><?php the_field('season_title'); ?></h2>
        </div>
        <div class="season__sliders">
          <?php
          $seasonList = get_field('season_list');
          if($seasonList): ?>
            <ul class="season__list">
              <?php 
              foreach($seasonList as $sl): ?>
              <li class="season__item">
                <div class="season__wrapper">
                  <h3 class="season__wrapper-title">
                    <?php echo $sl['season_body-title'] ?>
                  </h3>
                  <div class="season__img">
                    <img src="<?php echo $sl['season_img'] ?>" alt="img" />
                  </div>
                  <div class="season__body">
                    <h3 class="season__body-title">
                      <?php echo $sl['season_body-title'] ?>
                    </h3>
                    <ul class="season__body-list">
                      <?php 
                      foreach($sl['season_body-list'] as $bodyList): ?>
                      <li class="season__body-item">
                        <?php echo $bodyList['season_body-item'] ?>
                      </li>
                      <?php
                      endforeach;
                      ?>
                    </ul>
                    <div class="season__wrapper-btns">
                      <button class="season__btns-l">
                        <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/workouts/ArrowL.svg" alt="arrow" />
                      </button>
                      <button class="season__btns-r">
                        <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/workouts/ArrowR.svg" alt="arrow" />
                      </button>
                    </div>
                  </div>
                </div>
              </li>
              <?php
              endforeach;
              ?>
            </ul>
          <?php
          endif ?>
        </div>
      </section>
      <section id="contacts" class="contacts">
        <div class="container">
          <h2 class="title contacts__title">Записаться на тренировку</h2>
          <div class="contacts__wrapper">
            <div class="contacts__map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.894615771181!2d33.384604868794604!3d47.913103090123435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40db20a2306d07ad%3A0xbe64a97b55741eca!2z0LLRg9C70LjRhtGPINCS0L7Qu9C-0YHQtdCy0LjRh9CwLCAxLCA5NSwg0JrRgNC40LLQuNC5INCg0ZbQsywg0JTQvdGW0L_RgNC-0L_QtdGC0YDQvtCy0YHRjNC60LAg0L7QsdC70LDRgdGC0YwsIDUwMDAw!5e0!3m2!1sru!2sua!4v1622898533066!5m2!1sru!2sua"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
            <div class="contacts__body">
              <div class="contacts__links">
                <span class="contacts__tel">
                  <a href="tel:+380673917070">+38 (067) 391 70 70</a>
                </span>
                <span class="contacts__inst"><a href="#">arena_kr</a></span>
              </div>
              <div class="contacts__form">
                <form>
                  <ul class="contacts__form-list">
                    <li class="contacts__form-item">
                      <input
                        type="text"
                        id="name"
                        placeholder="Ваше имя"
                        required
                      />
                    </li>
                    <li class="contacts__form-item">
                      <select id="select">
                        <option disabled selected value="">
                          Интересующее напрвление
                        </option>
                        <option value="Бокс">Бокс</option>
                        <option value="Тайский Бокс">Тайский Бокс</option>
                        <option value="Борьба">Борьба</option>
                        <option value="Тяжелая атлетика">
                          Тяжелая атлетика
                        </option>
                        <option value="Функциональная тренировка">
                          Функциональная тренировка
                        </option>
                      </select>
                    </li>
                    <li class="contacts__form-item">
                      <input
                        type="tel"
                        id="phone"
                        placeholder="Номер телефона"
                        required
                      />
                    </li>
                    <li class="contacts__form-item">
                      <input type="time" id="time" />
                    </li>
                  </ul>
                  <label class="contacts__checkbox" for="checkbox">
                    <input type="checkbox" id="checkbox" required />
                    <span>Я согласен(а), с условием передачи информации</span>
                  </label>
                  <button class="button contacts__form-btn">Записаться</button>
                </form>
              </div>
            </div>
          </div>
          <div class="contacts__info">
            <span class="contacts__addres"
              >г. Кривой Рог, 95 кв ул. Волосевича 1е</span
            >
            <span class="contacts__time">с 8:00 до 21:00</span>
          </div>
          <a href="#top" class="contacts__btn-t">
            <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/contacts/arrow-top.svg" alt="arrowTop" />
          </a>
        </div>
      </section>
      <section class="popup-menu">
        <div class="popup-menu__inner">
          <div class="popup-menu__close">
            <button class="popup-menu__close-btn"></button>
          </div>
          <h3 class="popup-menu__title">Arena</h3>
          <ul class="popup-menu__list">
            <li class="popup-menu__item"><a href="#workouts">Тренировки</a></li>
            <li class="popup-menu__item"><a href="#description">О клубе</a></li>
            <li class="popup-menu__item"><a href="#trainers">тренера</a></li>
            <li class="popup-menu__item"><a href="#season">Абонементы</a></li>
            <li class="popup-menu__item"><a href="#contacts">Контакты</a></li>
          </ul>
          <div class="popup-menu__socials">
            <a href="#">
              <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/insta.svg" alt="link-insta" />
            </a>
            <a href="#">
              <img src="<?php  echo bloginfo("template_url"); ?>/assets/images/banner/tel.svg" alt="link-tel" />
            </a>
          </div>
          <a href="#contacts" class="button header__btn">Записаться</a>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="container">
        <ul class="footer__list">
          <li class="footer__item">
            <a href="#" class="footer__police">Политика конфиденциальности</a>
          </li>
          <li class="footer__item">
            <span class="footer__copy">© Арена 2021 Все права защещины</span>
          </li>
          <li class="footer__item">
            <span class="footer__dev">
              Дизайн и разработка:
              <a href="#">Maks</a> & <a href="#">Margarita</a>
            </span>
          </li>
        </ul>
      </div>
    </footer>
    <?php 
      wp_footer();
    ?>
  </body>
</html>
