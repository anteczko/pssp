<table class="table">
    <thead>
    <tr>
        <th scope="col">AuthorIDth>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Button</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($books as $book) {
        echo '<tr >';
            echo '<td>'.$book['author'].'</td>';
            echo '<td>'.$book['name'].'</td>';
            echo '<td>'.$book['description'].'</td>';
            echo '<td><a href="/books/show/'.$book['id'].'">Widzisz mnie?</a></td>';
        echo '</tr >';
        }
    ?>
    </tbody>
</table>