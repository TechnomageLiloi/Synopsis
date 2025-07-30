<link href="/API/Book/Edit/Style.css" rel="stylesheet" />
<div id="application-diary-edit">
    <a class="butn" href="javascript:void(0)" onclick="Requests.Book.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a class="butn" href="javascript:void(0)" onclick="Requests.Book.show('<?php echo $entity->getKey(); ?>');">Cancel</a>
    <hr/>
    <table>
        <tr><td>Program</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->parseData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a class="butn" href="javascript:void(0)" onclick="Requests.Book.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a class="butn" href="javascript:void(0)" onclick="Requests.Book.show('<?php echo $entity->getKey(); ?>');">Cancel</a>
</div>