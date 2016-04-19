<h2><?php echo $title ?></h2>

<?php
//當表單驗證錯誤時，用來顯示錯誤訊息。 
	echo validation_errors(); 
?>

<?php 
// Form 輔助函式 所提供的，它將會顯示表單元素並增加一些額外功能。 例如增加一個隱藏的 CSRF 預防欄位 
echo form_open('news/create') 
?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>