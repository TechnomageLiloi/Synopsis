<style>
    #cont
    {
        width: 100%;
        height: 300px;
    }
</style>
<div class="actions">
    <a href="javascript:void(0)" onclick="Application.Stylo.save('<?php echo $key; ?>');">Save</a>
</div>
<div>
    <textarea id="cont"><?php echo $content; ?></textarea>
</div>