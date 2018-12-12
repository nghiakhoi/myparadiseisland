<div id="box_display">
<div id="list_table">
                  <!-- Paging -->
                  <div id="paging" class="pagination">
                  <?php
                    if($num_rows>0){
                        echo $link;
                        echo " | Tổng số thành viên : ".$num_rows;
                    }
                  ?>
                  </div>

                    <table width="75%" cellpadding="2" cellspacing="2">
                          <tbody>
                          <tr>
                            <td width="20%" class="table_titile">Username</td>
                            <td width="20%" class="table_titile">Email</td>
                            <td width="20%" class="table_titile">Ngày thêm</td>
                            <td width="20%" class="table_titile">Status</td>
                            <td width="20%" class="table_titile">Modify</td>
                          </tr>
                          <?php
                            $count=0;
                            if($num_rows>0){
                                foreach ($users as $item) {
                                    $count++;
                                    if($count%2==0)
                                        echo "<tr class='row_chan'>";
                                    else
                                        echo "<tr>";
                                    echo '<td>'.$item['username'].'</td>';
                                    echo '<td>'.$item['email'].'</td>';
                                    echo '<td>'.$item['add_date'].'</td>';
                                    if($item['active']==1){
                                        echo '<td>Actived</td>';
                                    }else{
                                        echo '<td>Pending...</td>';
                                    }
                                    echo '<td class="alt">
                                            <a href="'.base_url().'admin/user/edit/'.$item['userid'].'">Edit</a>
                                            <a href="'.base_url().'admin/user/delete/'.$item['userid'].'" >Delete</a>
                                         </td>';
                                    echo "</tr>";  
                                }
                            }
                          ?>
                    </tbody>
                   </table>
</div>
</div>