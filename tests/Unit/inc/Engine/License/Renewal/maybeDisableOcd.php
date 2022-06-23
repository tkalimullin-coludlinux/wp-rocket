<?php

namespace WP_Rocket\Tests\Unit\inc\Engine\License\Renewal;

use Mockery;
use WP_Rocket\Admin\Options_Data;
use WP_Rocket\Engine\License\API\Pricing;
use WP_Rocket\Engine\License\API\User;
use WP_Rocket\Engine\License\Renewal;
use WP_Rocket\Tests\Unit\TestCase;

/**
 * @covers \WP_Rocket\Engine\License\Renewal::maybe_disable_ocd
 *
 * @group License
 */
class Test_MaybeDisableOcd extends TestCase {
	private $pricing;
	private $user;
	private $renewal;
	private $options;

	protected function setUp(): void {
		parent::setUp();

		$this->stubEscapeFunctions();
		$this->stubTranslationFunctions();

		$this->pricing = Mockery::mock( Pricing::class );
		$this->user    = Mockery::mock( User::class );
		$this->options =Mockery::mock( Options_Data::class );
		$this->renewal = new Renewal(
				$this->pricing,
				$this->user,
				$this->options,
				'views'
		);
	}

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldReturnExpected( $config, $args, $expected ) {
		$this->user->shouldReceive( 'is_auto_renew' )
			->andReturn( $config['auto_renew'] );

		$this->user->shouldReceive( 'is_license_expired' )
			->andReturn( $config['expired'] );

		$this->user->shouldReceive( 'get_license_expiration' )
			->andReturn( $config['expire_date'] );

		$this->assertSame(
			$expected,
			$this->renewal->maybe_disable_ocd( $args )
		);
	}
}
