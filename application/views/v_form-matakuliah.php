<section>
    <?= validation_errors(); ?>
    <form action="<?= base_url('web/tampilMataKuliah'); ?>" method="post">
        <table>
            <tr>
                <td>Kode MTK</td>
                <td>:</td>
                <td>
                    <input type="text" name="kode" id="kode">
                </td>
            </tr>
            <tr>
                <td>Nama MTK</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" id="nama">
                </td>
            </tr>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td>
                    <select name="sks" id="sks">
                        <option value="">Pilih SKS</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</section>