<?

namespace Stiggergh;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FileSizeTwigExtension extends AbstractExtension {
   public function getFilters() {
      return [
         new TwigFilter('formatFileSize', [$this, 'formatFileSize']),
      ];
   }

   public function formatFileSize($size) {
      $units = ['B', 'KB', 'MB', 'GB', 'TB'];

      for ($i = 0; $size >= 1024 && $i < 4; $i++) {
         $size /= 1024;
      }

      return round($size, 2) . ' ' . $units[$i];
   }
}
