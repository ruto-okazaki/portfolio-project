<?php
// Template Name: 私について
get_header();
?>

<section class="profile width contents">
    <h1 class="vertical">Profile</h1>
    <div class="flex">
        <div class="left">
            <img src="<?php echo get_template_directory_uri(); ?>/img/profile1.jpeg" alt="" class="profileimg1">
        </div>
        <div class="right">
            <h2>WebDesigner</h2>
            <h3 class="ja"><ruby>岡崎&emsp;流宇斗<rt>おかざき&emsp;るうと</rt></ruby></h3>
            <!-- <table class="ja">
                <tr>
                    <td>所在地&nbsp;&nbsp;&nbsp;:</td>
                    <td>神奈川県川崎市宮前区</td>
                </tr>
                <tr>
                    <td>メール<span class="br"></span>アドレス&nbsp;&nbsp;&nbsp;:</td>
                    <td><a href="mailto:ruto20010207@gmail.com">ruto20010207@gmail.com</a></td>
                </tr>
            </table> -->
            <p>Webデザイナーを目指しております。
                <br>よろしくお願いいたします。
                <br>
                <br>神奈川県出身、現在も神奈川県川崎市在住
                <br>趣味はサブカルチャー、映画鑑賞、ファッション、スキー/スノボ
                <br>
                <br>大学時代にゼロから独学でコーディングやCMS、デザインソフトの使い方、デザインやWebのことを学び、実務として、ホームページの制作をひとりで行って参りました。
                <br>デザインからホームページの制作、公開、運用を行っています。
                <br>ゆくゆくは、このマーケティングを踏まえて、私が構築したサイトを実際に集客できるサイトにしていき、運用していこうと考えております。
                <br>ただ創るだけでなく、見やすさ、使いやすさといったようなUI/UXを意識し、お客様のその先の目的を達成するサイトを制作することを心がけております。
                <br>その後は、私が培ったノウハウをお客様にもお伝えできるようなWebデザイナーを目指しています。
            </p>
        </div>
    </div>
    <div class="flex flex1">
        <div class="left">
            <img src="<?php echo get_template_directory_uri(); ?>/img/profile.jpg" alt="">
        </div>
        <div class="right">
            <h3 class="ja">Webデザイナーを<span class="br"></span>志した理由</h3>
            <p>この職業を目指した理由として、私自身が個人で事業をされている方と関わらせていただく機会が多く、
                そのうちに、そのような方たちのお力になりたい、そのために何かできることはないかと考えた際に、
                昔からモノをつくることが好きだったため、何かクリエイティブなことで、
                私が作ったものによってお客様に喜んでいただきたい。このような形でお役に立ちたい。
                <br>この想いを実現するためにできることは何かを考えたときに、 web制作/デザインと出会い、この仕事をしていきたいと考えました。
            </p>
        </div>
    </div>
</section>

<section class="skill_container width">
    <div class="contents">
        <dl class="skills">
            <div>
                <dt class="skill_btn">
                    <div class="title">
                        <h1>Skill</h1>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </dt>

                <div class="skillbox">
                    <dd class="skill">
                        <div class="icon">
                            <span class="html_css">
                                <i class="fab fa-html5"></i><i class="fab fa-css3-alt"></i>
                            </span>
                            <h3>HTML/CSS</h3>
                        </div>
                        <p>デザイン通りのサイトのコーディングを行い、<span class="br"></span>コンテンツやレイアウト・アニメーションを実装します</p>
                    </dd>

                    <dd class="skill">
                        <div class="icon">
                            <i class="fab fa-js-square"></i>
                            <h3>JavaScript</h3>
                        </div>
                        <p>
                            サイトに訪れたユーザー様を楽しませるために、jQureyなども用いながら、<span class="br"></span>サイトに動きをつけ、よりリッチなものを構築します
                        </p>
                    </dd>

                    <dd class="skill">
                        <div class="icon">
                            <i class="fab fa-wordpress"></i>
                            <h3>WordPress</h3>
                        </div>
                        <p>
                            ご自身でサイトをレイアウトを崩さずに更新したり、内容を変えたいと思いませんか?
                            <span class="br"></span>制作したサイトをお客様の方で簡単に管理・更新できるシステムであるWordPressで実装させていただきます
                            <br>オリジナルテーマ制作及び公開
                        </p>
                    </dd>

                    <dd class="skill">
                        <div class="icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/adobe_xd_macos_bigsur_icon_190424.png" alt="XDロゴ" />
                            <h3>Adobe&nbsp;&nbsp;XD</h3>
                        </div>
                        <p>
                            提案段階のワイヤーフレーム及び<span class="br"></span>プロトタイプの設計や、<span class="br"></span>デザインカンプの作成をいたします
                        </p>
                    </dd>

                    <dd class="skill">
                        <div class="icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/adobe_photoshop_macos_bigsur_icon_190436.png" alt="Photoshopロゴ" />
                            <h3>Photoshop</h3>
                        </div>
                        <p>
                            画像加工・バナー・サムネイル制作
                        </p>
                    </dd>

                    <dd class="skill">
                        <div class="icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/adobe_illustrator_macos_bigsur_icon_190447.png" alt="Photoshopロゴ" />
                            <h3>Illustrator</h3>
                        </div>
                        <p>
                            ただいま、実務で扱えるよう勉強しております
                        </p>
                    </dd>
                </div>
            </div>
        </dl>
    </div>
</section>

<section class="philosophy width contens">
    <h1 class="ja">私の想い</h1>
    <p>
    <p>
        大学時代では、個人で事業されている方やご活躍されている方と関わらせていただく機会が多く、その方々から様々なことを学ばせていただきました。
        <br>そのような方々は、ご縁や人とのつながりを大切にしており、お客様としてだけではなく、関係性を築き上げ、長いお付き合いをしている姿をみて、感銘を受けました。
        <br>私自身も第一に考え、何よりも大切にしていきたいと考えております。そのようなきっかけができるサービスを他人様にも提供したいという想いで、このお仕事を目指しました。
    <p>
        今まで、携わらせていただいたお仕事では、お客様と直接打ち合わせを行い、お客様のご要望をしっかりと聞いたうえで、目的やイメージを引き出し、こちらからもその目的に合うようなご提案していきながら、
        それをお客様とすり合わせていき、二人三脚で制作させていただきました。
    </p>
    <p class="center">何卒、よろしくお願いいたします。</p>
    </p>
</section>

<?php
get_footer();
?>