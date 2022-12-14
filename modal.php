<!-- Add Modal -->
<div class="myModal" v-if="showAddModal">
    <div class="modalContainer">
        <div class="modalHeader">
            <span class="headerTitle">Add New Car</span>
            <button class="closeBtn pull-right" @click="showAddModal = false">×</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Brand:</label>
                <input type="text" class="form-control" v-model="newCar.brand">
            </div>
            <div class="form-group">
                <label>Model:</label>
                <input type="text" class="form-control" v-model="newCar.model">
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="text" class="form-control" v-model="newCar.price">
            </div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showAddModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary" @click="showAddModal = false; saveCar();"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </div>
    </div>
</div>
 
<!-- Edit Modal -->
<div class="myModal" v-if="showEditModal">
    <div class="modalContainer">
        <div class="editHeader">
            <span class="headerTitle">Edit Car</span>
            <button class="closeEditBtn pull-right" @click="showEditModal = false">×</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Brand:</label>
                <input type="text" class="form-control" v-model="clickCar.brand">
            </div>
            <div class="form-group">
                <label>Model:</label>
                <input type="text" class="form-control" v-model="clickCar.model">
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="text" class="form-control" v-model="clickCar.price">
            </div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showEditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" @click="showEditModal = false; updateCar();"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
        </div>
    </div>
</div>
 
<!-- Delete Modal -->
<div class="myModal" v-if="showDeleteModal">
    <div class="modalContainer">
        <div class="deleteHeader">
            <span class="headerTitle">Delete Car</span>
            <button class="closeDelBtn pull-right" @click="showDeleteModal = false">×</button>
        </div>
        <div class="modalBody">
            <h5 class="text-center">Are you sure you want to Delete</h5>
            <h2 class="text-center">{{clickCar.brand}} {{clickCar.model}} {{clickCar.price}}</h2>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showDeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" @click="showDeleteModal = false; deleteCar(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
        </div>
    </div>
</div>