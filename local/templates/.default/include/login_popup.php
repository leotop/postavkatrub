<?if ($USER->IsAuthorized()) {?>
    <div class="personal-popup">
        Личный кабинет ▼ 
    </div>             
    <div class="personal-info-popup">        
        <?
            $userID = $USER->GetID();
            $rsUser = CUser::GetByID($userID);
            $arUser = $rsUser->Fetch();
        ?>
        <div class="personal-user-info">
            <?if(!empty($arUser['LOGIN'])) {
                echo $arUser['LOGIN']."<br>";
            }?>        
            <?if(!empty($arUser['NAME'])&&!empty($arUser['LAST_NAME'])) {
                echo $arUser['NAME']." ".$arUser['LAST_NAME']."<br>";
            }?>        
            <?if(!empty($arUser['WORK_COMPANY'])) {
                echo $arUser['WORK_COMPANY']."<br>";
            }?>
        </div>
        <div class="personal-menu">
            <a href="/personal/order/">Мои заказы</a><br>
            <a href="/personal/">Мои настройки</a><br>
        </div>
        <div class="personal-exit">
            <a href="/?logout=yes">Выйти</a>
        </div>
    </div>
    <?} else {?>           
    <a class="personal-popup" href="/authorization/">
        Войти 
    </a>
    <?}?>

<script>
    $(document).ready(function(){
        $(".personal-popup").click(function(){
            $(".personal-info-popup").slideToggle("slow");
        });
    });    
</script>