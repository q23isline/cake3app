<h1>Behavior sample</h1>

<style>
span.bold {
    color: #66a;
    font-weight: bold;
    font-size: smaller;
}
div.box {
    border: 1px solid #ddd;
    margin: 5px;
    padding: 5px;
}
</style>

<p>※<?= $data->username ?> の情報</p>

<?= $this->PersonalDataInfo->showPersonalDataInfo($data) ?>
