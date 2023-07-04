<?php

namespace App\Enums;

enum NewsStatus: string
{
   case DRAFT = 'DRAFT';
   case ACTIVE = 'ACTIVE';
   case BLOCKED = 'BLOCKED';

   public static function all(): array
   {
       return [
           self::DRAFT->value,
           self::ACTIVE->value,
           self::BLOCKED->value,
       ];
   }
}