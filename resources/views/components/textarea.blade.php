@props(['value', 'id', 'name'])

<textarea class="rounded-md shadow-md" name="{{ $name }}" id="{{ $id }}">{{ $value }}</textarea>
<script>
    CKEDITOR.replace({{ $id }});
</script>