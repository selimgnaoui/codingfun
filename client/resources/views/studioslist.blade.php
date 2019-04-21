<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body>
        <div class="container">
      <table border="1px solid" id="studios" class="display" style="width:100%">
          <thead><tr>
<th>   Studio name     </th>
<th>    City     </th>
<th>    Trainer    </th>
<th>    Price    </th>
<th>    Shower    </th>
<th>    mlz    </th>
<th>    Rating     </th>
              <th>    Langitude     </th>
              <th>    Latitude     </th>
          </tr>
          </thead>
         <tbody>

             @foreach ($studios as $studio)
                 <tr>
                      <td>{{ $studio['name'] }}</td>
                     <td>{{ $studio['city'] }}</td>
                     <td>{{ $studio['trainer'] }}</td>
                     <td>{{ $studio['price'] }}</td>
                     <td>{{ $studio['shower'] }}</td>
                     <td>{{ $studio['mlz'] }}</td>
                     <td>{{ $studio['rating'] }}</td>
                     <td>{{ $studio['latitude'] }}</td>
                     <td>{{ $studio['longitude'] }}</td>
                 </tr>
             @endforeach



         </tbody>
          <tfoot>
          <th>   Studio name     </th>
          <th>    City     </th>
          <th>    Trainer    </th>
          <th>    Price    </th>
          <th>    Shower    </th>
          <th>    mlz    </th>
          <th>    Rating     </th>
          </tfoot>
      </table>


        </div>
</body>
    <script>
        $(document).ready(function() {

            $('#studios').DataTable( {
                "order": [[ 3, "asc" ],[ 6, "desc" ]]
            } );
            } );
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</html>
