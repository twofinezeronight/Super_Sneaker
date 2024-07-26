
</nav>
            <div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=categories_add" class="btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i = 1;
                                foreach ($danhmuclist as $dm) {
                                    extract($dm);
                                    
                                    echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$name.'</td>
                                            <td>
                                                <a href="index.php?pg=delcat&id='.$id.'" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>';
                                        $i++;
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>