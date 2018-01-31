{% extends 'base.html.twig' %}

{% block body %}
    <h1><?= $entity_class_name; ?></h1>

    <table>
    <?php foreach ($entity_fields as $field): ?>
        <tr>
            <th><?= ucfirst($field['fieldName']); ?></th>
            <td>{{ <?= $entity_var_singular; ?>.<?= $field['fieldName']; ?> }}</td>
        </tr>
    <?php endforeach; ?>
    </table>

    <a href="{{ path('<?= $route_name; ?>_index') }}">back to list</a>

    <a href="{{ path('<?= $route_name; ?>_edit', {'<?= $entity_identifier; ?>':<?= $entity_var_singular; ?>.<?= $entity_identifier; ?>}) }}">edit</a>

    {% include '<?= $route_name?>/_delete_form.html.twig' with {'identifier': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>} only %}

{% endblock %}