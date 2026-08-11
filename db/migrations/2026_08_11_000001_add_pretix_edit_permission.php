<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder as SchemaBuilder;

class AddPretixEditPermission extends Migration
{
    protected Connection $db;

    public function __construct(SchemaBuilder $schema)
    {
        parent::__construct($schema);
        $this->db = $this->schema->getConnection();
    }

    /**
     * Run the migration
     */
    public function up(): void
    {
        $configEditId = $this->getPrivilegeId('config.edit');

        $this->db->table('privileges')
            ->insertOrIgnore([
                'name' => 'pretix.edit',
                'description' => 'Edit Pretix voucher settings and voucher pool',
            ]);
        $pretixEditId = $this->getPrivilegeId('pretix.edit');

        $groups = $this->db->table('group_privileges')
            ->select('group_id')
            ->where('privilege_id', $configEditId)
            ->get('group_id');

        $insertValues = [];
        foreach ($groups as $group) {
            $insertValues[] = ['group_id' => $group->group_id, 'privilege_id' => $pretixEditId];
        }

        if ($insertValues) {
            $this->db->table('group_privileges')
                ->insertOrIgnore($insertValues);
        }
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->db->table('privileges')
            ->where('name', 'pretix.edit')
            ->delete();
    }

    private function getPrivilegeId(string $privilege): int
    {
        return $this->db->table('privileges')
            ->where('name', $privilege)
            ->get(['id'])
            ->first()
            ->id;
    }
}
