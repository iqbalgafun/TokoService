<!DOCTYPE html>
<html lang="en">
<div class="table-responsive">
  <table>
    <thead>
      <tr>
        <th><strong>No Transaksi</strong></th>
        <th><strong>User</strong></th>
        <th><strong>Store</strong></th>
        <th><strong>Tgl Service</strong></th>
        <th><strong>Catatan Service</strong></th>
        <th><strong>Status</strong></th>
      </tr>
    </thead>
    <tbody>
      @foreach($transaksi as $key => $data);
      <tr>
        <th>{{$data->id_transaksi}}</th>
        <th>{{$data->user_id}}</th>
        <th>{{$data->id_store}}</th>
        <th>{{$data->tgl_service}}</th>
        <th>{{$data->catatan_service}}</th>
        <th>{{$data->id_status}}</th>
      </tr>
      @endforeach;
    </tbody>
  </table>
</div>
</html>