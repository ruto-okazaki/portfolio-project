'use strict';

// ローディング画面
{
    window.onload = () => {
        const loading = document.getElementById('js-loading');
        loading.classList.add('loaded');
    };
}
window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload();
    }
};

// topへ戻る
{
    const TopBtn = document.getElementById('js-to-top');
    TopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// スクロールされたらコンテンツ表示
{
    function callback(entries, obs) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.classList.add('appear');
            obs.unobserve(entry.target);
        });
    }

    const options = {
        threshold: 0.2,
    };
    const observer = new IntersectionObserver(callback, options);

    const targets = document.querySelectorAll('#js-contents');
    targets.forEach(target => {
        observer.observe(target);
    });
}

// レスポンシブナビ
{
    const btn = document.getElementById('js-sp-nav-btn');
    const nav = document.getElementById('js-sp-nav');

    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        nav.classList.toggle('open');
    });
    nav.addEventListener('click', () => {
        btn.classList.toggle('open');
        nav.classList.toggle('open');
    });
}

// アコーディオン
// {
//     const dts = document.querySelectorAll('.js-dt');
//     dts.forEach(dt => {
//         dt.addEventListener('click', () => {
//             dt.parentNode.classList.toggle('open');
//             // ひとつの開くと他は閉じる
//             dts.forEach(el => {
//                 if (dt !== el) {
//                     el.parentNode.classList.remove('open');
//                 }
//             });
//         });
//     });
// }

// タブの切り替え
// {
//     const tabLists = document.querySelectorAll('.feature_list_tab li');
//     const tabContents = document.querySelectorAll('.feature_list_item');

//     tabLists.forEach(tabItem => {
//         tabItem.addEventListener('click', () => {
//             tabLists.forEach(tabItem => {
//                 tabItem.classList.remove('current');
//             });
//             tabItem.classList.add('current');

//             tabContents.forEach(tabContent => {
//                 tabContent.classList.remove('current');
//             });
//             document.getElementById(tabItem.dataset.id).classList.add('current');
//         });
//     });
// }

//モーダル
// {
//     const openBtn = document.getElementsByClassName('js-modal_open');
//     const closeBtn = document.getElementsByClassName('js-modal_close-btn');
//     const modal = document.getElementsByClassName('js-modal');
//     const overlay = document.getElementById('js-modalOverlay');

//     Array.from(openBtn).forEach(elem => {
//         elem.addEventListener('click', () => {
//             elem.parentNode.querySelector('.js-modal').classList.add('active');
//             overlay.classList.add('active');
//         });
//     });

//     Array.from(closeBtn).forEach(elem => {
//         elem.addEventListener('click', () => {
//             elem.parentNode.classList.remove('active');
//             overlay.classList.remove('active');
//         });
//     });

//     overlay.addEventListener('click', () => {
//         Array.from(modal).forEach(elem => {
//             elem.classList.remove('active');
//             overlay.classList.remove('active');
//         });
//     });
// }


// // スライドショー
// {
//     const next = document.getElementById('next');
//     const back = document.getElementById('back');
//     const ul = document.querySelector('#img');
//     const slides = ul.children;
//     const dots = [];
//     let num = 0;


//     function loop() {
//         if (num < 0) {
//             num = slides.length - 1;
//         }
//         if (num === slides.length) {
//             num = 0;
//         }

//     }

//     function move() {
//         const slideWidth = slides[0].getBoundingClientRect().width;
//         ul.style.transform = `translateX(${-1 * slideWidth * num}px)`;
//     }

//     function setupDots() {
//         for (let i = 0; i < slides.length; i++) {
//             const button = document.createElement('button');
//             button.addEventListener('click', () => {
//                 num = i;
//                 updateDots();
//                 loop();
//                 move();
//             });
//             dots.push(button);
//             document.getElementById('dots').appendChild(button);
//         }
//         dots[0].classList.add('current');
//     }

//     function updateDots() {
//         dots.forEach(dot => {
//             dot.classList.remove('current');
//         });
//         dots[num].classList.add('current');
//     }

//     function autoplay() {
//         setTimeout(function () {
//             next.click();
//             autoplay();
//         }, 3000);
//     }
//     window.onload = autoplay();

//     setupDots();

//     next.addEventListener('click', () => {
//         num++;
//         loop();
//         updateDots();
//         move();
//     });

//     back.addEventListener('click', () => {
//         num--;
//         loop();
//         updateDots();
//         move();
//     });


//     window.addEventListener('resize', () => {
//         move();
//     });

//     //setInterval(loop, 3000);
// }

// ここからjQuery
// モーダル
// $(function () {
//     $('.modal_open').on('click', function () {
//         $('.modal, .modal_over-lay').addClass('active');
//         $('.modal').append("<img src=" + $(this).children('img').attr("src") + ">");
//     });

//     $('.modal_close-btn, .modal_over-lay').on('click', function () {
//         $('.modal').children('img').remove();
//         $('.modal, .modal_over-lay').removeClass('active');
//     });
// });

// $('.modal_open').each(function () {
//     $(this).on('click', function () { // ←「.modal_open」の1つ1つに対してイベント設定
//         $(this).parent().find('.modal').addClass('active'); // クリックされた要素自身の親要素の中にある「.modal」にクラス名を追加
//         $('.modal_over-lay').addClass('active');
//     });
// });

// $('.modal_close-btn').each(function () {
//     $(this).on('click', function () {
//         $('.modal').removeClass('active');
//         $('.modal_over-lay').removeClass('active');
//     });
// });

// $('.modal_over-lay').on('click', function () {
//     $('.modal').each(function () {
//         $(this).removeClass('active');
//         $('.modal_over-lay').removeClass('active');
//     });
// });

// スキルカテゴリタブ
// (() => {
//     const $doc = document;
//     const $tab = document.getElementById()
//     const $category = $tab.querySelectorAll('[data-category]');
//     const $content = $tab.querySelectorAll('[data-content]');
// })();

// スキルカテゴリ一覧
$(function () {
    $('.js-category-switch-tab').on('click', function () {
        $('.js-category-switch-tab, .js-list').removeClass('active');
        $(this).addClass('active');

        var index = $('.js-category-switch-tab').index(this);
        $('.js-list').eq(index).addClass('active');
    });
});

// スキル一覧（タブの切り替え）
$(function () {
    $('.js-skills-btn').on('click', function () {
        $('.js-skills-btn, .js-skills_list_item, .js-default-message').removeClass('active');
        $(this).addClass('active');

        var index = $('.js-skills-btn').index(this);
        $('.js-skills_list_item').eq(index).addClass('active');
    });
});