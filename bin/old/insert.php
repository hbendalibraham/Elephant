<?php

require_once("connexion.php");
require_once("include.php");

?>

<?php if (isset($msg)) echo "<div class='card'><p style='text-align: center; font-size: 24px'>$msg</p></div>"; ?>

<div class="card" style="padding:0;"><img src="img/add_exo.png" style="width: 100%"></div>

<div class="card" >
    <form method="post" action="bin/controler_insert.php" accept-charset="UTF-8">
        

		<div id="frm" >

            <!--div class="fr en">EMail</div-->
            <br><br>
            <p>
                الإسم
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["email"]?>">
                <input type="text" style="width: 100%" value="<?php echo $_SESSION["name"]?>" disabled>
            </p>

            <p>
                المستوي / الصف <span class="red">*</span>
                <select style="width: 100%" name="lv" class="turnintodropdown" required>
                    <option>&nbsp;</option>
                    <option value="00">التكوين ما قبل التدريس</option>

                    <option value="10">الإبتدائي</option>
                    <option value="11">الإبتدائي السنة 1</option>
                    <option value="12">الإبتدائي السنة 2</option>
                    <option value="13">الإبتدائي السنة 3</option>
                    <option value="14">الإبتدائي السنة 4</option>
                    <option value="15">الإبتدائي السنة 5</option>

                    <option value="20">التعليم المتوسط</option>
                    <option value="21">التعليم المتوسط 1</option>
                    <option value="22">التعليم المتوسط 2</option>
                    <option value="23">التعليم المتوسط 3</option>
                    <option value="24">التعليم المتوسط 4</option>

                    <option value="40">التعليم الثنوي</option>
                    <option value="41">التعليم الثنوي 1</option>
                    <option value="42">التعليم الثنوي 2</option>
                    <option value="43">التعليم الثنوي 3</option>

                    <option value="50">التعليم الجامعي</option>

                    <option value="60">التكوين المهني</option>

                </select>
            </p>

            <p>
                الفرع / الشعبة
                <input type="text" style="width: 100%" maxlength="200" name="dev">
            </p>

            <p>
                المادة <span class="red">*</span>
                <input type="text" list="matier" name="mat" style="width: 100%" required>
                <datalist id="matier">
                    <?php
                    //$sql = "SELECT `mat` FROM `mostawdae` WHERE 1 GROUP BY `mat` ORDER BY `mat` ASC;";
                    $sql = "SELECT `name` FROM `matiere` WHERE 1 GROUP BY `name` ORDER BY `name` ASC;";
                    $res = $db->fetchAll($sql);
                    foreach ($res as $line)
                    {
                        echo "<option value='".$line->name."'>";
                    }
                    ?>
                </datalist>
            </p>

            <p>
                الموضوع <span class="red">*</span>
                <input type="text" style="width: 100%" maxlength="200" name="subject" required>
            </p>

            <p>
                التمرين <span class="red">*</span>
                <textarea style="width: 100%; height: 200px; overflow: auto" name="exo" required></textarea>
            </p>

            <p>
                الحل
                <textarea style="width: 100%; height: 200px; overflow: auto" name="solution"></textarea>
                <!--script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script-->

            </p>

            <p>
                المرجع المقتبس منه إن وجد
                <input type="text" style="width: 100%" maxlength="200" name="ref">
            </p>
            
            <!-- Captcha -->
            <p>
                ما هو هذا الرقم يا ترى ؟ <span class="red">*</span><br>
                <input type="text" name="cApTcHa" style="width:170px; background: url('img/captcha.php') no-repeat; background-position: 0 5px; " required /><br/>
            </p>

            <p>
                <input type="submit" value="حفض" class="mdl-button">
            </p>

            يجب ملء جميع الخانة التي تحتوي علي [ <span class="red">*</span> ]

        </div>
    </form>


</div>
