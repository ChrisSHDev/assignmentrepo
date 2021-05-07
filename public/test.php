<?php   $teamMember = [8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6];
      function devideTeam(array $members)      {          sort($members);                    $teamA = [];          $teamB = [];            for ($i=0; $i<(count($members)/2); $i++) {              $j = $i+1;                if ($i % 2 == 0) {                  $teamA[] = $members[$i];                  $teamA[] = $members[count($members) - ($j)];              } else {                  $teamB[] = $members[$i];                  $teamB[] = $members[count($members) - ($j)];              }          }
          return [$teamA, $teamB];      };
      $result = devideTeam($teamMember);

print_r($result);