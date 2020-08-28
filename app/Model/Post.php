<?php

namespace LaraDev\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = ['titulo', 'subtitulo', 'descricao'];

    protected $guarded = []; //bloqueia os campos que não podem ser informados para a aplicação

    public const CREATED_AT = 'criado_em';
    public const UPDATED_AT = 'alterado_em';

    public $timestamps = true;
}
