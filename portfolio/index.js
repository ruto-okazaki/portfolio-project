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

// ここからjQuery
// スキルカテゴリ一覧（タブの切り替え）
$(function () {
    $('.js-category-switch-tab').on('click', function () {
        $('.js-category-switch-tab, .js-list').removeClass('active');
        $(this).addClass('active');

        var index = $('.js-category-switch-tab').index(this);
        $('.js-list').eq(index).addClass('active');
    });
});

// スキル一覧 (クリックで詳細表示)
$(function () {
    $('.js-skills-btn').on('click', function () {
        $('.js-skills-btn').removeClass('active');
        $(this).addClass('active');
    });
});

// モーダル
$(function () {
    $('.js-modal-btn').on('click', function () {
        $('.modal, .modal_over-lay').removeClass('active');
        // クリックされた要素の子要素のモーダルに 'active' クラスを追加
        $(this).find('.modal').addClass('active');
        $('.modal_over-lay').addClass('active');
    });
    // モーダルとオーバーレイの閉じるボタンのクリックイベント
    $(document).on('click', '.modal_close-btn, .modal_over-lay', function () {
        $('.modal.active, .modal_over-lay.active').removeClass('active');
        $('.js-skills-btn').removeClass('active');
    });
});