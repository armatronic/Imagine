<?php
/*
 * This file is part of the Imagine package.
 *
 * (c) Amri Sannang <amri.sannang@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Image\Effects;

use Imagine\Image\Effects\ConvolutionMatrix;

class ConvolutionMatrixTest extends \PHPUnit_Framework_TestCase
{
    public function testNormalize()
    {
        $matrix = new ConvolutionMatrix(
            -1, -1, -1,
            -1, 16, -1,
            -1, -1, -1
        );
        $normalizedMatrix = $matrix->normalize();
        $this->assertEquals(
            [-.125, -.125, -.125, -.125, 2, -.125, -.125, -.125, -.125],
            $normalizedMatrix->getKernel()
        );
        $this->assertEquals(
            [
                [-.125, -.125, -.125],
                [-.125, 2, -.125],
                [-.125, -.125, -.125]
            ],
            $normalizedMatrix->getMatrix()
        );
        $this->assertEquals(
            [-1, -1, -1, -1, 16, -1, -1, -1, -1],
            $matrix->getKernel()
        );
        $this->assertEquals(
            [
                [-1, -1, -1],
                [-1, 16, -1],
                [-1, -1, -1]
            ],
            $matrix->getMatrix()
        );
    }
}
