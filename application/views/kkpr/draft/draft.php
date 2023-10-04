<h1>Draft Form</h1>
    
    <form id="draftForm" action="<?= base_url('draft/save_draft') ?>" method="post">
        <input type="text" id="name" name="name" placeholder="Name" value="<?= isset($draft_data['name']) ? $draft_data['name'] : '' ?>"><br>
        <input type="email" id="email" name="email" placeholder="Email" value="<?= isset($draft_data['email']) ? $draft_data['email'] : '' ?>"><br>
        <select name="kelamin" id="kelamin">
            <option value=""></option>
            <option value="tes" <?php if($draft_data['kelamin'] == 'tes' ) echo'selected'; ?>>laki-laki</option>
            <option value="perempuan" <?php if($draft_data['kelamin'] == 'perempuan' ) echo'selected'; ?>>perempuan</option>
        </select>
        <textarea id="message" name="message" placeholder="Message"><?= isset($draft_data['message']) ? $draft_data['message'] : '' ?></textarea><br>
        <!-- Tidak perlu tombol Save Draft -->
        <?= isset($draft_data['kelamin']) ? $draft_data['kelamin'] : '' ?>"
    </form>