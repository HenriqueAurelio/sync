<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required autofocus>
    </div>
</div>