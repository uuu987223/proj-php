
<!DOCTYPE html>
<html>

    <head>
        <title>呼叫管家</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script type="text/javascript" src="<?php echo $host; ?>js/rem.js"></script>
        <link rel="stylesheet" href="<?php echo $host; ?>css/style.css">
    </head>

    <body class="bodyBlack" ontouchstart>

        <div class="guanjiaList">
            <ul>
                <?php
                foreach($list as $row){
                ?>
                <li>
                    <div class="clearfix">
                        <div class="img"><img src="<?php echo $host; ?>img/guanjia/ts.jpg"></div>
                        <div class="txt">
                            <div class="t clearfix">
                                <p><span class="org">姓名：</span><span class="name"><?php echo $row['name']; ?></span></p>
                                <p><span class="org">管家级别：</span><span class="star">
                                        <!--
                                                 <i class="active"></i>
                     <i class="active"></i>
                     <i class="active"></i>
                     <i class="half"></i>
                     <i></i>
                                            -->
                                        <?php
                                        $level = $row['level'];
                                            for ($i = 0; $i < 5; $i++) {
                                                if ($level > 1) {
                                                    $level = $level - 2;
                                                    echo "<i class='active'></i>";
                                                }
                                                elseif($level > 0) {
                                                    $level = $level - 1;
                                                    echo "<i class='half'></i>";
                                                }else{
                                                    echo "<i></i>";
                                                }
                                            }
                                            ?>
                                    </span></p>
                            </div>
                            <p class="desc"><span class="org">简介：</span><?php echo $row['desc']; ?></p>
                        </div>
                    </div>
                    <a href="tel:<?php echo $row['phone']; ?>" class="btn">呼叫管家</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>

    </body>

</html>