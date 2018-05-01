<?php
// Ожидает глобальную переменную $result
// В которой содержится передаваемая информация
header('Content-type: application/json');
echo json_encode($result);