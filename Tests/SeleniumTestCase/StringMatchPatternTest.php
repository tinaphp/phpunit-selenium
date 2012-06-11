<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2010-2012, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHPUnit_Selenium
 * @author     Lex Vjatkin <lex@vjatkin.cz>
 * @copyright  2010-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 */

/**
 * Tests for PHPUnit_Extensions_SeleniumTestCase.
 *
 * @package    PHPUnit_Selenium
 * @author     Lex Vjatkin <lex@vjatkin.cz>
 * @copyright  2010-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 */
class Tests_SeleniumTestCase_StringMatchPattersTest extends Tests_SeleniumTestCase_BaseTestCase
{
    /**
     * @return string
     */
    public function testGlob()
    {
        $this->open('html/test_text_patterns.html');

        //http://release.seleniumhq.org/selenium-core/0.8.0/reference.html#patterns

        //page title is <title>"Test page" not found</title>
        //so:

        //default pattern should be glob and "match_all":
        $this->verifyNotTitle('Test page');
        $this->verifyTitle('"Test page" not found');
        $this->verifyTitle('"*" not found');

        //explicit glob: should work too:
        $this->verifyNotTitle('glob:Test page');
        $this->verifyTitle('glob:"Test page" not found');
        $this->verifyTitle('glob:"*" not found');
    }
}
