<div class="list-group mt-4">
<?php
    if(sizeof($garages) == 0)
    {
        Print "<p class='text-center mt-4'>You don't have any garages yet.</p>";
    }
    else
    {
        foreach($garages as $garage)
        {
            Print "<a href='".current_url()."/".$garage->url."' class='list-group-item list-group-item-action flex-column align-items-start'>
            <div class='d-flex w-100 justify-content-between'>
              <h5 class='mb-1'>".$garage->name."'s Garage</h5>
            </div><small class='text-muted'>Manage garage</small>
            </a>";
        }
    }
?>
</div>

<p class="mt-4">
    <a class="btn btn-outline-success" href="garages/add">Create a new Garage</a>
    <a class="btn btn-outline-danger" href="garages/add" style="float:right">Log out</a>
</p>