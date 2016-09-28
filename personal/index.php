<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Личный кабинет");
?>
<div class='personal'>
    <h2>Личная информация</h2>
    <ul>
        <li><a href="profile/">Изменить регистрационные данные</a></li>
        <li><a href="profile/?change_password=yes">Изменить пароль</a></li>
        <li><a href="profile/?forgot_password=yes">Забыли пароль?</a></li>
    </ul>

    <h2>Заказы</h2>
    <ul>
        <li><a href="order/">Ознакомиться с состоянием заказов</a></li>
        <li><a href="cart/">Посмотреть содержимое корзины</a></li>
        <li><a href="order/?filter_history=Y">Посмотреть историю заказов</a></li>
    </ul>

    <h2>Подписка</h2>
    <ul>
        <li><a href="subscribe/">Подписаться на рассылку</a></li>
    </ul>
</div>						
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>