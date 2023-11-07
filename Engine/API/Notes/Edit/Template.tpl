<link href="<?php echo ROOT_URL; ?>/Engine/API/Notes/Edit/Template.css" rel="stylesheet" />

<div id="game-maps-edit">
    <a href="javascript:void(0)" onclick="Synopsis.Notes.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Synopsis.Notes.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>" /></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Note</td><td><textarea name="note"><?php echo $entity->getNote(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Synopsis.Notes.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Synopsis.Notes.show();">Cancel</a>
</div>