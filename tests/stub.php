<?php
// Fake mysqli used by the tests: records every prepared statement and bound value.
$GLOBALS['log'] = [];
class StubResult { public $num_rows = 0; function fetch_assoc() { return null; } }
class StubStmt {
    private $sql; public $error = ''; public $vals = [];
    function __construct($sql) { $this->sql = $sql; }
    function bind_param($types, &...$v) { $this->vals = $v; return true; }
    function execute() { $GLOBALS['log'][] = [$this->sql, $this->vals]; return true; }
    function get_result() { return new StubResult(); }
    function close() {}
}
class StubDb extends mysqli {
    function __construct() {}
    #[\ReturnTypeWillChange] function set_charset($c) { return true; }
    #[\ReturnTypeWillChange] function prepare($sql) { return new StubStmt($sql); }
    #[\ReturnTypeWillChange] function query($sql, $m = 0) { $GLOBALS['log'][] = [$sql, []]; return new StubResult(); }
    #[\ReturnTypeWillChange] function close() { return true; }
    #[\ReturnTypeWillChange] function real_escape_string($s) { return $s; }
}
$GLOBALS['db_factory'] = fn() => new StubDb();
