<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title><?php echo $this->pageTitle;?></title>
    <link href="/css/stylemain.css" rel="stylesheet" type="text/css" />
    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    <script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
<div id="container">
    <div id="header">
        <div id="hbg-r"></div>
        <div id="header-in">
            <a id="logo" href="/"></a>
            <div id="header-r">
                <div id="top-menu">
                    <ul>
                        <li><a href="/">Каталог препаратов</a></li>
                        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>3));?>">Доставка и оплата</a></li>
                        <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>4));?>">Вопросы-ответы</a></li>
                        <li><a href="<?php echo $this->createUrl('/site/contact');?>">Написать нам</a></li>
                    </ul>
                </div>

                <div id="phone">
                    <span><?php echo GetArray::getRandomPhone('idWebmaster');?></span>
                </div>
                <div id="addid">
                    <?php $wmid = GetArray::getWmid();
                    if (!empty($wmid)):?>
                    <span>Внимание! Обязательно назовите добавочный номер: <b><?php echo $wmid;?></b></span>
					<?php else: ?>
					<span>Внимание! Обязательно назовите добавочный номер: <b>4</b></span>
                    <?php endif;?>
                </div>
                <div id="time">
                    <span>Прием заказов 24 часа в сутки</span>
                </div>
            </div>
        </div>
    </div>

    <div id="container-in">
        <?php echo $content;?>
        <div class="clr"></div>
    </div><!--/container-in-->

    <div id="footer">
        <div id="fbg-r"></div>
        <div id="footer-in">
            <div id="copyright">© «Джойсон», 2013.</div>
            <ul id="footer-social">
                <li><img src="/images/fb.png" alt=""/></li>
                <li><img src="/images/tw.png" alt=""/></li>
                <li><img src="/images/rss.png" alt=""/></li>
            </ul>
            <div id="footer-menu">
                <ul>
                    <li><a href="/">Каталог препаратов</a></li>
                    <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>3));?>">Доставка и оплата</a></li>
                    <li><a href="<?php echo $this->createUrl('article/detail',array('id'=>4));?>">Вопросы-ответы</a></li>
                    <li><a href="<?php echo $this->createUrl('/site/contact');?>">Написать нам</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21106033 = new Ya.Metrika({id:21106033,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21106033" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>